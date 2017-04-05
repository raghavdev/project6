<?php

/* themes/custom/mta/templates/layout/row--header.html.twig */
class __TwigTemplate_421263d71b6799e604012035df76cdad617828b8f1d5346e9671db75b8b810a1 extends Twig_Template
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

        // line 18
        echo "<div";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["row_attributes"]) ? $context["row_attributes"] : null), "html", null, true));
        echo ">
  ";
        // line 19
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["row_prefix"]) ? $context["row_prefix"] : null), "html", null, true));
        echo "
  <header";
        // line 20
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["wrapper_attributes"]) ? $context["wrapper_attributes"] : null), "html", null, true));
        echo ">
    <div";
        // line 21
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["container_attributes"]) ? $context["container_attributes"] : null), "html", null, true));
        echo ">
      ";
        // line 22
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["regions"]) ? $context["regions"] : null), "html", null, true));
        echo "
    </div>
  </header>
  ";
        // line 25
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["row_suffix"]) ? $context["row_suffix"] : null), "html", null, true));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/mta/templates/layout/row--header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 25,  60 => 22,  56 => 21,  52 => 20,  48 => 19,  43 => 18,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Row template suggestion to display the header row.*/
/*  **/
/*  * Available variables:*/
/*  * - row_name: the name of the row.*/
/*  * - regions: contains regions data to appear in this row.*/
/*  * - row_attributes: HTML attributes for the row outer wrapper*/
/*  * - wrapper_attributes: HTML attributes for the row inner wrapper.*/
/*  * - container_attributes: HTML attributes for the row container.*/
/*  * - row_prefix: insert content/markup etc before the row.*/
/*  * - row_suffix: insert content/markup etc after the row.*/
/*  **/
/*  * @see at_core_preprocess_row()*/
/*  *//* */
/* #}*/
/* <div{{ row_attributes }}>*/
/*   {{ row_prefix }}*/
/*   <header{{ wrapper_attributes }}>*/
/*     <div{{ container_attributes }}>*/
/*       {{ regions }}*/
/*     </div>*/
/*   </header>*/
/*   {{ row_suffix }}*/
/* </div>*/
/* */
