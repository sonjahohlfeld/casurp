<?php

/* /login.html.twig */
class __TwigTemplate_7f0c694a3073204ee22a4a6c981f7e0a5033fda2c5fd24bda14f2fc4b64c43f2 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "/login.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "/login.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "/login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"container\">
        <div class=\"card card-login mx-auto mt-5\">
            <div class=\"card-header\">Login</div>
            <div class=\"card-body\">
                <form>
                    <div class=\"form-group\">
                        <div class=\"form-label-group\">
                            <input type=\"email\" id=\"inputEmail\" class=\"form-control\" placeholder=\"Email address\" required=\"required\" autofocus=\"autofocus\">
                            <label for=\"inputEmail\">Email address</label>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"form-label-group\">
                            <input type=\"password\" id=\"inputPassword\" class=\"form-control\" placeholder=\"Password\" required=\"required\">
                            <label for=\"inputPassword\">Password</label>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"checkbox\">
                            <label>
                                <input type=\"checkbox\" value=\"remember-me\">
                                Remember Password
                            </label>
                        </div>
                    </div>
                    <a class=\"btn btn-primary btn-block\" href=\"#\">Login</a>
                </form>
                <div class=\"text-center\">
                    <a class=\"d-block small mt-3\" href=\"#\">Register an Account</a>
                    <a class=\"d-block small\" href=\"#\">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 4,  44 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block body %}
    <div class=\"container\">
        <div class=\"card card-login mx-auto mt-5\">
            <div class=\"card-header\">Login</div>
            <div class=\"card-body\">
                <form>
                    <div class=\"form-group\">
                        <div class=\"form-label-group\">
                            <input type=\"email\" id=\"inputEmail\" class=\"form-control\" placeholder=\"Email address\" required=\"required\" autofocus=\"autofocus\">
                            <label for=\"inputEmail\">Email address</label>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"form-label-group\">
                            <input type=\"password\" id=\"inputPassword\" class=\"form-control\" placeholder=\"Password\" required=\"required\">
                            <label for=\"inputPassword\">Password</label>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"checkbox\">
                            <label>
                                <input type=\"checkbox\" value=\"remember-me\">
                                Remember Password
                            </label>
                        </div>
                    </div>
                    <a class=\"btn btn-primary btn-block\" href=\"#\">Login</a>
                </form>
                <div class=\"text-center\">
                    <a class=\"d-block small mt-3\" href=\"#\">Register an Account</a>
                    <a class=\"d-block small\" href=\"#\">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
", "/login.html.twig", "/home/sonja/Dokumente/projects/coffee/templates/login.html.twig");
    }
}
