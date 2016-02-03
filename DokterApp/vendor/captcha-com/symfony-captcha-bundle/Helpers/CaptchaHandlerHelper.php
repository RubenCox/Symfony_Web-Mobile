<?php

namespace Captcha\Bundle\CaptchaBundle\Helpers;

use Captcha\Bundle\CaptchaBundle\Helpers\BotDetectCaptchaHelper;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CaptchaHandlerHelper
{
    /**
     * @var object
     */
    private $captcha;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct(SessionInterface $session, array $captchaConfig)
    {
        $this->captcha = new BotDetectCaptchaHelper($session, $captchaConfig);
    }

    /**
     * Get the captcha image or sound or validation result.
     */
    public function getCaptchaResponse()
    {
        if (is_null($this->captcha)) {
            throw new BadRequestHttpException('captcha');
        }

        $commandString = $this->getUrlParameter('get');
        if (!\LBD_StringHelper::HasValue($commandString)) {
            \LBD_HttpHelper::BadRequest('command');
        }

        $command = \LBD_CaptchaHttpCommand::FromQuerystring($commandString);
        switch ($command) {
            case \LBD_CaptchaHttpCommand::GetImage:
                $responseBody = $this->getImage();
                break;
            case \LBD_CaptchaHttpCommand::GetSound:
                $responseBody = $this->getSound();
                break;
            case \LBD_CaptchaHttpCommand::GetValidationResult:
                $responseBody = $this->getValidationResult();
                break;
            default:
                \LBD_HttpHelper::BadRequest('command');
                break;
        }

        // disallow audio file search engine indexing
        header('X-Robots-Tag: noindex, nofollow, noarchive, nosnippet');
        echo $responseBody;
        exit;
    }

    /**
     * Generate a Captcha image.
     *
     * @return image
     */
    public function getImage()
    {
        if (is_null($this->captcha)) {
            \LBD_HttpHelper::BadRequest('captcha');
        }

        // identifier of the particular Captcha object instance
        $instanceId = $this->getInstanceId();
        if (is_null($instanceId)) {
            \LBD_HttpHelper::BadRequest('instance');
        }

        // response headers
        \LBD_HttpHelper::DisallowCache();

        // response MIME type & headers
        $mimeType = $this->captcha->CaptchaBase->ImageMimeType;
        header("Content-Type: {$mimeType}");

        // we don't support content chunking, since image files
        // are regenerated randomly on each request
        header('Accept-Ranges: none');

        // image generation
        $rawImage = $this->captcha->CaptchaBase->GetImage($instanceId);
        $this->captcha->CaptchaBase->Save();

        $length = strlen($rawImage);
        header("Content-Length: {$length}");
        return $rawImage;
    }

    /**
     * Generate a Captcha sound.
     *
     * @return image
     */
    public function getSound()
    {
        if (is_null($this->captcha)) {
            \LBD_HttpHelper::BadRequest('captcha');
        }

        // identifier of the particular Captcha object instance
        $instanceId = $this->getInstanceId();
        if (is_null($instanceId)) {
            \LBD_HttpHelper::BadRequest('instance');
        }

        // response headers
        \LBD_HttpHelper::SmartDisallowCache();

        // response MIME type & headers
        $mimeType = $this->captcha->CaptchaBase->SoundMimeType;
        header("Content-Type: {$mimeType}");
        header('Content-Transfer-Encoding: binary');

        // sound generation
        $rawSound = $this->captcha->CaptchaBase->GetSound($instanceId);
        return $rawSound;
    }

    /**
     * The client requests the Captcha validation result (used for Ajax Captcha validation).
     *
     * @return json
     */
    public function getValidationResult()
    {
        if (is_null($this->captcha)) {
            \LBD_HttpHelper::BadRequest('captcha');
        }

        // identifier of the particular Captcha object instance
        $instanceId = $this->getInstanceId();
        if (is_null($instanceId)) {
            \LBD_HttpHelper::BadRequest('instance');
        }

        $mimeType = 'application/json';
        header("Content-Type: {$mimeType}");

        // code to validate
        $userInput = $this->getUserInput();

        // JSON-encoded validation result
        $result = $this->captcha->AjaxValidate($userInput, $instanceId);
        $this->captcha->CaptchaBase->Save();

        $resultJson = $this->getJsonValidationResult($result);

        return $resultJson;
    }

    /**
     * @return string
     */
    private function getInstanceId()
    {
        $instanceId = $this->getUrlParameter('t');
        if (!\LBD_StringHelper::HasValue($instanceId) ||
            !\LBD_CaptchaBase::IsValidInstanceId($instanceId)
        ) {
            return;
        }
        return $instanceId;
    }

    /**
     * Extract the user input Captcha code string from the Ajax validation request.
     *
     * @return string
     */
    private function getUserInput()
    {
        // BotDetect built-in Ajax Captcha validation
        $input = $this->getUrlParameter('i');

        if (is_null($input)) {
            // jQuery validation support, the input key may be just about anything,
            // so we have to loop through fields and take the first unrecognized one
            $recognized = array('get', 'c', 't', 'd');
            foreach ($_GET as $key => $value) {
                if (!in_array($key, $recognized)) {
                    $input = $value;
                    break;
                }
            }
        }

        return $input;
    }

    /**
     * Encodes the Captcha validation result in a simple JSON wrapper.
     *
     * @return string
     */
    private function getJsonValidationResult($result)
    {
        $resultStr = ($result ? 'true': 'false');
        return $resultStr;
    }

    /**
     * @param  string  $param
     *
     * @return string|null
     */
    private function getUrlParameter($param)
    {
        return filter_input(INPUT_GET, $param);
    }
}
