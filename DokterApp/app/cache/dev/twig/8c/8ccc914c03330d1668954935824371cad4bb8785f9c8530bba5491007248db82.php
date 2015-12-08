<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_1c1b62155a4cb4281d8c2ce90fe5014ec694b39d20858204de85879c73b67c76 extends Twig_Template
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
        $__internal_291534cadc0910f530bb759f36ac5415bb9a29d25032328c34226ce10130ff62 = $this->env->getExtension("native_profiler");
        $__internal_291534cadc0910f530bb759f36ac5415bb9a29d25032328c34226ce10130ff62->enter($__internal_291534cadc0910f530bb759f36ac5415bb9a29d25032328c34226ce10130ff62_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_291534cadc0910f530bb759f36ac5415bb9a29d25032328c34226ce10130ff62->leave($__internal_291534cadc0910f530bb759f36ac5415bb9a29d25032328c34226ce10130ff62_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_4faa1d731bc3508f4b7804cf999676b2bbff6e7b8d2b12365629e975b880c6be = $this->env->getExtension("native_profiler");
        $__internal_4faa1d731bc3508f4b7804cf999676b2bbff6e7b8d2b12365629e975b880c6be->enter($__internal_4faa1d731bc3508f4b7804cf999676b2bbff6e7b8d2b12365629e975b880c6be_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_4faa1d731bc3508f4b7804cf999676b2bbff6e7b8d2b12365629e975b880c6be->leave($__internal_4faa1d731bc3508f4b7804cf999676b2bbff6e7b8d2b12365629e975b880c6be_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_8c59aa9cae84553edf10987ec3354438edf1291f138ee6228b9f9c79b6232f3a = $this->env->getExtension("native_profiler");
        $__internal_8c59aa9cae84553edf10987ec3354438edf1291f138ee6228b9f9c79b6232f3a->enter($__internal_8c59aa9cae84553edf10987ec3354438edf1291f138ee6228b9f9c79b6232f3a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_8c59aa9cae84553edf10987ec3354438edf1291f138ee6228b9f9c79b6232f3a->leave($__internal_8c59aa9cae84553edf10987ec3354438edf1291f138ee6228b9f9c79b6232f3a_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_33805d0f9ebf969eef82780921ac78a7b2e3eb23d240968bfadf41534222c7d6 = $this->env->getExtension("native_profiler");
        $__internal_33805d0f9ebf969eef82780921ac78a7b2e3eb23d240968bfadf41534222c7d6->enter($__internal_33805d0f9ebf969eef82780921ac78a7b2e3eb23d240968bfadf41534222c7d6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_33805d0f9ebf969eef82780921ac78a7b2e3eb23d240968bfadf41534222c7d6->leave($__internal_33805d0f9ebf969eef82780921ac78a7b2e3eb23d240968bfadf41534222c7d6_prof);

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
