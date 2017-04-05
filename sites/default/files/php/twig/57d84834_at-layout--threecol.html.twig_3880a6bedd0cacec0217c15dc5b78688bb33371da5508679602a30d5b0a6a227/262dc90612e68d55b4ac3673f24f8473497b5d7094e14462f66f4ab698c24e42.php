<?php

/* themes/contrib/adaptivetheme/at_core/layout_plugin/templates/threecol/at-layout--threecol.html.twig */
class __TwigTemplate_3c4253b81384aeaac50300b174c92c9142437b42a037c651106b3a0874706df3 extends Twig_Template
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
        $tags = array("set" => 10, "for" => 11, "if" => 12);
        $filters = array("trim" => 12, "render" => 12, "merge" => 13, "slice" => 13, "length" => 16, "join" => 16);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'for', 'if'),
                array('trim', 'render', 'merge', 'slice', 'length', 'join'),
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

        // line 10
        $context["int"] = array();
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => "col_1", 1 => "col_2", 2 => "col_3"));
        foreach ($context['_seq'] as $context["_key"] => $context["region"]) {
            // line 12
            if ( !twig_test_empty(trim($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), $context["region"], array(), "array"))))) {
                // line 13
                $context["int"] = twig_array_merge((isset($context["int"]) ? $context["int"] : null), array(0 => twig_slice($this->env, $context["region"], 4, 1)));
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['region'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        $context["layout_classes"] = array(0 => ("l-arc--" . twig_length_filter($this->env, (isset($context["int"]) ? $context["int"] : null))), 1 => ("l-ac--" . twig_join_filter((isset($context["int"]) ? $context["int"] : null), "-")));
        // line 18
        echo "<";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["html_element"]) ? $context["html_element"] : null), "html", null, true));
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["layout_classes"]) ? $context["layout_classes"] : null)), "method"), "html", null, true));
        echo ">
  ";
        // line 19
        if ( !twig_test_empty(trim($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "top", array()))))) {
            // line 20
            echo "    <div class=\"atl__lr\">
      <div class=\"atl__lc atl__top\">
        ";
            // line 22
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "top", array()), "html", null, true));
            echo "
      </div>
    </div>
  ";
        }
        // line 26
        echo "
  ";
        // line 27
        if ((($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "col_1", array()) || $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "col_2", array())) || $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "col_3", array()))) {
            // line 28
            echo "    <div class=\"atl__lr atl__cw\">
      ";
            // line 29
            if ( !twig_test_empty(trim($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "col_1", array()))))) {
                // line 30
                echo "        <div class=\"atl__lc lc-1\">
          ";
                // line 31
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "col_1", array()), "html", null, true));
                echo "
        </div>
      ";
            }
            // line 34
            echo "
      ";
            // line 35
            if ( !twig_test_empty(trim($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "col_2", array()))))) {
                // line 36
                echo "        <div class=\"atl__lc lc-2\">
          ";
                // line 37
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "col_2", array()), "html", null, true));
                echo "
        </div>
      ";
            }
            // line 40
            echo "
      ";
            // line 41
            if ( !twig_test_empty(trim($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "col_3", array()))))) {
                // line 42
                echo "        <div class=\"atl__lc lc-3\">
          ";
                // line 43
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "col_3", array()), "html", null, true));
                echo "
        </div>
      ";
            }
            // line 46
            echo "    </div>
  ";
        }
        // line 48
        echo "
  ";
        // line 49
        if ( !twig_test_empty(trim($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "bottom", array()))))) {
            // line 50
            echo "    <div class=\"atl__lr\">
      <div class=\"atl__lc atl__bottom\">
        ";
            // line 52
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "bottom", array()), "html", null, true));
            echo "
      </div>
    </div>
  ";
        }
        // line 56
        echo "</";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["html_element"]) ? $context["html_element"] : null), "html", null, true));
        echo ">
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/adaptivetheme/at_core/layout_plugin/templates/threecol/at-layout--threecol.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 56,  139 => 52,  135 => 50,  133 => 49,  130 => 48,  126 => 46,  120 => 43,  117 => 42,  115 => 41,  112 => 40,  106 => 37,  103 => 36,  101 => 35,  98 => 34,  92 => 31,  89 => 30,  87 => 29,  84 => 28,  82 => 27,  79 => 26,  72 => 22,  68 => 20,  66 => 19,  60 => 18,  58 => 16,  51 => 13,  49 => 12,  45 => 11,  43 => 10,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Adaptivetheme implementation to display a three column Layout Plugin layout.*/
/*  **/
/*  * Available variables:*/
/*  * - content: holds layout regions.*/
/*  * - attributes: layout attributes.*/
/* #}*/
/* {%- set int = [] -%}*/
/* {%- for region in ['col_1', 'col_2', 'col_3'] %}*/
/*   {%- if content["#{region}"]|render|trim is not empty -%}*/
/*     {%- set int = int|merge([region|slice(4, 1)]) -%}*/
/*   {%- endif -%}*/
/* {%- endfor -%}*/
/* {%- set layout_classes = ['l-arc--' ~ int|length, 'l-ac--' ~ int|join('-')] -%}*/
/* */
/* <{{ html_element }}{{ attributes.addClass(layout_classes) }}>*/
/*   {% if content.top|render|trim is not empty %}*/
/*     <div class="atl__lr">*/
/*       <div class="atl__lc atl__top">*/
/*         {{ content.top }}*/
/*       </div>*/
/*     </div>*/
/*   {% endif %}*/
/* */
/*   {% if content.col_1 or content.col_2 or content.col_3 %}*/
/*     <div class="atl__lr atl__cw">*/
/*       {% if content.col_1|render|trim is not empty %}*/
/*         <div class="atl__lc lc-1">*/
/*           {{ content.col_1 }}*/
/*         </div>*/
/*       {% endif %}*/
/* */
/*       {% if content.col_2|render|trim is not empty %}*/
/*         <div class="atl__lc lc-2">*/
/*           {{ content.col_2 }}*/
/*         </div>*/
/*       {% endif %}*/
/* */
/*       {% if content.col_3|render|trim is not empty %}*/
/*         <div class="atl__lc lc-3">*/
/*           {{ content.col_3 }}*/
/*         </div>*/
/*       {% endif %}*/
/*     </div>*/
/*   {% endif %}*/
/* */
/*   {% if content.bottom|render|trim is not empty %}*/
/*     <div class="atl__lr">*/
/*       <div class="atl__lc atl__bottom">*/
/*         {{ content.bottom }}*/
/*       </div>*/
/*     </div>*/
/*   {% endif %}*/
/* </{{ html_element }}>*/
/* */
