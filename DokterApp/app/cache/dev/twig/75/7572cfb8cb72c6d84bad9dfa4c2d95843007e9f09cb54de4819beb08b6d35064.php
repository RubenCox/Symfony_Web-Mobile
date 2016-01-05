<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_81855e5645ad40bdf231a396711006a6ae48033cca5bbd4892b64e3c8fd923eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b5c599af0cc928dd434bdd6cdb263090b37e44420c6748b10902a1adc9d02107 = $this->env->getExtension("native_profiler");
        $__internal_b5c599af0cc928dd434bdd6cdb263090b37e44420c6748b10902a1adc9d02107->enter($__internal_b5c599af0cc928dd434bdd6cdb263090b37e44420c6748b10902a1adc9d02107_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b5c599af0cc928dd434bdd6cdb263090b37e44420c6748b10902a1adc9d02107->leave($__internal_b5c599af0cc928dd434bdd6cdb263090b37e44420c6748b10902a1adc9d02107_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_fb675bfc99e2a9720884095122be3dcf30bacf6b5dc3ced34eb2d0506ff83b73 = $this->env->getExtension("native_profiler");
        $__internal_fb675bfc99e2a9720884095122be3dcf30bacf6b5dc3ced34eb2d0506ff83b73->enter($__internal_fb675bfc99e2a9720884095122be3dcf30bacf6b5dc3ced34eb2d0506ff83b73_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_fb675bfc99e2a9720884095122be3dcf30bacf6b5dc3ced34eb2d0506ff83b73->leave($__internal_fb675bfc99e2a9720884095122be3dcf30bacf6b5dc3ced34eb2d0506ff83b73_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_9b8c89cffb9566c726d6c3ce2adb3b2f2a69b4968190828d5eca463531d5bf3e = $this->env->getExtension("native_profiler");
        $__internal_9b8c89cffb9566c726d6c3ce2adb3b2f2a69b4968190828d5eca463531d5bf3e->enter($__internal_9b8c89cffb9566c726d6c3ce2adb3b2f2a69b4968190828d5eca463531d5bf3e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_9b8c89cffb9566c726d6c3ce2adb3b2f2a69b4968190828d5eca463531d5bf3e->leave($__internal_9b8c89cffb9566c726d6c3ce2adb3b2f2a69b4968190828d5eca463531d5bf3e_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_6517d8dae63d1e720eabcd6dd51278bf8208bc4f2036fc91ed997c052ad80967 = $this->env->getExtension("native_profiler");
        $__internal_6517d8dae63d1e720eabcd6dd51278bf8208bc4f2036fc91ed997c052ad80967->enter($__internal_6517d8dae63d1e720eabcd6dd51278bf8208bc4f2036fc91ed997c052ad80967_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_6517d8dae63d1e720eabcd6dd51278bf8208bc4f2036fc91ed997c052ad80967->leave($__internal_6517d8dae63d1e720eabcd6dd51278bf8208bc4f2036fc91ed997c052ad80967_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
