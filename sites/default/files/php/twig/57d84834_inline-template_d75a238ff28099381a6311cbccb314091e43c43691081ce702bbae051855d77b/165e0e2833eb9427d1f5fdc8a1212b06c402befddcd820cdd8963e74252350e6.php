<?php

/* {# inline_template_start #}<div data-at-row="attribution" class="l-attribution l-row"><div class="l-pr attribution"><div class="l-rw">{{ attribution }}</div></div></div> */
class __TwigTemplate_e439144b6174e9f070512ca8b649a66cfb13ffdf27018b6e491e594a04bbe1cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<div data-at-row=\"attribution\" class=\"l-attribution l-row\"><div class=\"l-pr attribution\"><div class=\"l-rw\">";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attribution"]) ? $context["attribution"] : null), "html", null, true));
        echo "</div></div></div>";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}<div data-at-row=\"attribution\" class=\"l-attribution l-row\"><div class=\"l-pr attribution\"><div class=\"l-rw\">{{ attribution }}</div></div></div>";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }
}
/* {# inline_template_start #}<div data-at-row="attribution" class="l-attribution l-row"><div class="l-pr attribution"><div class="l-rw">{{ attribution }}</div></div></div>*/
