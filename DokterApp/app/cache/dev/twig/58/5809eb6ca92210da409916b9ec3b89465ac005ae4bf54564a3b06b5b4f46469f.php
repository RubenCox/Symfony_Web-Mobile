<?php

/* base.html.twig */
class __TwigTemplate_ac5dcf13285063e4589e701c389ddeb94d5257793df8fd7ba29d0b3093ecfdc4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ee9c59cf9f38c84360493c147115123a62be9023947fd1dff98312e0de66f1c2 = $this->env->getExtension("native_profiler");
        $__internal_ee9c59cf9f38c84360493c147115123a62be9023947fd1dff98312e0de66f1c2->enter($__internal_ee9c59cf9f38c84360493c147115123a62be9023947fd1dff98312e0de66f1c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_ee9c59cf9f38c84360493c147115123a62be9023947fd1dff98312e0de66f1c2->leave($__internal_ee9c59cf9f38c84360493c147115123a62be9023947fd1dff98312e0de66f1c2_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_2972eeec0b9fd65645c5958fbb5074a24d9f23d20bd372d9326035e9f9df37ea = $this->env->getExtension("native_profiler");
        $__internal_2972eeec0b9fd65645c5958fbb5074a24d9f23d20bd372d9326035e9f9df37ea->enter($__internal_2972eeec0b9fd65645c5958fbb5074a24d9f23d20bd372d9326035e9f9df37ea_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_2972eeec0b9fd65645c5958fbb5074a24d9f23d20bd372d9326035e9f9df37ea->leave($__internal_2972eeec0b9fd65645c5958fbb5074a24d9f23d20bd372d9326035e9f9df37ea_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_dc8223564847c59c3c7556caf75a98cd377fc1015c7dc3873a9bde40b8c3cb7e = $this->env->getExtension("native_profiler");
        $__internal_dc8223564847c59c3c7556caf75a98cd377fc1015c7dc3873a9bde40b8c3cb7e->enter($__internal_dc8223564847c59c3c7556caf75a98cd377fc1015c7dc3873a9bde40b8c3cb7e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_dc8223564847c59c3c7556caf75a98cd377fc1015c7dc3873a9bde40b8c3cb7e->leave($__internal_dc8223564847c59c3c7556caf75a98cd377fc1015c7dc3873a9bde40b8c3cb7e_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_07c43aade9d335e0d30dab0d37c21555251a1da290255711748106cee7717504 = $this->env->getExtension("native_profiler");
        $__internal_07c43aade9d335e0d30dab0d37c21555251a1da290255711748106cee7717504->enter($__internal_07c43aade9d335e0d30dab0d37c21555251a1da290255711748106cee7717504_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_07c43aade9d335e0d30dab0d37c21555251a1da290255711748106cee7717504->leave($__internal_07c43aade9d335e0d30dab0d37c21555251a1da290255711748106cee7717504_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_7cad6d038dc5805051d100562938c28fab58a2fc3d695ea65149afc860d2e9d0 = $this->env->getExtension("native_profiler");
        $__internal_7cad6d038dc5805051d100562938c28fab58a2fc3d695ea65149afc860d2e9d0->enter($__internal_7cad6d038dc5805051d100562938c28fab58a2fc3d695ea65149afc860d2e9d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_7cad6d038dc5805051d100562938c28fab58a2fc3d695ea65149afc860d2e9d0->leave($__internal_7cad6d038dc5805051d100562938c28fab58a2fc3d695ea65149afc860d2e9d0_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
