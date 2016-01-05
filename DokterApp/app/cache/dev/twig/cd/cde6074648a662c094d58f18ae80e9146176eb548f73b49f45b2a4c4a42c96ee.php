<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_1f80e68a9510e723fb7fb811aeb0f6eb9c6d81733e2e76798ff4e71881fb243c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0ef9a491bb285265de6c97e7ac92df41929b65da5bf6ecc86621397d6bdd781a = $this->env->getExtension("native_profiler");
        $__internal_0ef9a491bb285265de6c97e7ac92df41929b65da5bf6ecc86621397d6bdd781a->enter($__internal_0ef9a491bb285265de6c97e7ac92df41929b65da5bf6ecc86621397d6bdd781a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0ef9a491bb285265de6c97e7ac92df41929b65da5bf6ecc86621397d6bdd781a->leave($__internal_0ef9a491bb285265de6c97e7ac92df41929b65da5bf6ecc86621397d6bdd781a_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_09ec4e12bfc586dcf5e0f0b8ab3d719b7e7d9560f2446592db9fc6467c20c63a = $this->env->getExtension("native_profiler");
        $__internal_09ec4e12bfc586dcf5e0f0b8ab3d719b7e7d9560f2446592db9fc6467c20c63a->enter($__internal_09ec4e12bfc586dcf5e0f0b8ab3d719b7e7d9560f2446592db9fc6467c20c63a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_09ec4e12bfc586dcf5e0f0b8ab3d719b7e7d9560f2446592db9fc6467c20c63a->leave($__internal_09ec4e12bfc586dcf5e0f0b8ab3d719b7e7d9560f2446592db9fc6467c20c63a_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_d3ff25cf8a88812a3559dc56d0ac8a2dd440d57a83b2d855b021dd04394b7996 = $this->env->getExtension("native_profiler");
        $__internal_d3ff25cf8a88812a3559dc56d0ac8a2dd440d57a83b2d855b021dd04394b7996->enter($__internal_d3ff25cf8a88812a3559dc56d0ac8a2dd440d57a83b2d855b021dd04394b7996_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d3ff25cf8a88812a3559dc56d0ac8a2dd440d57a83b2d855b021dd04394b7996->leave($__internal_d3ff25cf8a88812a3559dc56d0ac8a2dd440d57a83b2d855b021dd04394b7996_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_4e9d2b5d21ef929c28eaa269cde0a09fda45dc5c14a7e90f274067a2f9609871 = $this->env->getExtension("native_profiler");
        $__internal_4e9d2b5d21ef929c28eaa269cde0a09fda45dc5c14a7e90f274067a2f9609871->enter($__internal_4e9d2b5d21ef929c28eaa269cde0a09fda45dc5c14a7e90f274067a2f9609871_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_4e9d2b5d21ef929c28eaa269cde0a09fda45dc5c14a7e90f274067a2f9609871->leave($__internal_4e9d2b5d21ef929c28eaa269cde0a09fda45dc5c14a7e90f274067a2f9609871_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
