<?php

/* themes/custom/mta/templates/navigation/links.html.twig */
class __TwigTemplate_acb9e8383a15c9bc3ccc8a459c056be107e5cda64f76c859abc5c51765474ad4 extends Twig_Template
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
        $tags = array("if" => 35, "set" => 37, "for" => 41);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'set', 'for'),
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

        // line 35
        if ((isset($context["links"]) ? $context["links"] : null)) {
            // line 36
            if ((isset($context["heading"]) ? $context["heading"] : null)) {
                // line 37
                $context["heading_level"] = (($this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "level", array())) ? ($this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "level", array())) : ("h2"));
                // line 38
                echo "    <";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["heading_level"]) ? $context["heading_level"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "attributes", array()), "html", null, true));
                echo ">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["heading"]) ? $context["heading"] : null), "text", array()), "html", null, true));
                echo "</";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["heading_level"]) ? $context["heading_level"] : null), "html", null, true));
                echo ">";
            }
            // line 40
            echo "<ul";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attributes"]) ? $context["attributes"] : null), "html", null, true));
            echo ">";
            // line 41
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 42
                echo "<li";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "attributes", array()), "html", null, true));
                echo ">";
                // line 43
                if ($this->getAttribute($context["item"], "link", array())) {
                    // line 44
                    echo "<span";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "wrapper_attributes", array()), "html", null, true));
                    echo ">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "link", array()), "html", null, true));
                    echo "</span>";
                } elseif ($this->getAttribute(                // line 45
$context["item"], "text_attributes", array())) {
                    // line 46
                    echo "<span";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "text_attributes", array()), "html", null, true));
                    echo ">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "text", array()), "html", null, true));
                    echo "</span>";
                } else {
                    // line 48
                    echo "<span";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "wrapper_attributes", array()), "html", null, true));
                    echo ">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "text", array()), "html", null, true));
                    echo "</span>";
                }
                // line 50
                echo "</li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "</ul>";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/mta/templates/navigation/links.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 52,  95 => 50,  88 => 48,  81 => 46,  79 => 45,  73 => 44,  71 => 43,  67 => 42,  63 => 41,  59 => 40,  49 => 38,  47 => 37,  45 => 36,  43 => 35,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for a set of links.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: Attributes for the UL containing the list of links.*/
/*  * - links: Links to be output.*/
/*  *   Each item in links will have the following elements:*/
/*  *   - title: The link text.*/
/*  *   - link: The generated link. If omitted, the 'title' is shown as a plain*/
/*  *     text item in the links list in a <span> element.*/
/*  *   - text_attributes: (optional) HTML attributes for the <span> element if no*/
/*  *     'link' is supplied.*/
/*  *   - attributes: (optional) HTML attributes for the <li>.*/
/*  *   - wrapper_attributes: extra classes for theming link wrappers.*/
/*  * - heading: (optional) A heading to precede the links.*/
/*  *   - text: The heading text.*/
/*  *   - level: The heading level (e.g. 'h2', 'h3').*/
/*  *   - attributes: (optional) A keyed list of attributes for the heading.*/
/*  *   If the heading is a string, it will be used as the text of the heading and*/
/*  *   the level will default to 'h2'.*/
/*  **/
/*  *   Headings should be used on navigation menus and any list of links that*/
/*  *   consistently appears on multiple pages. To make the heading invisible use*/
/*  *   the 'visually-hidden' CSS class. Do not use 'display:none', which*/
/*  *   removes it from screen readers and assistive technology. Headings allow*/
/*  *   screen reader and keyboard only users to navigate to or skip the links.*/
/*  *   See http://juicystudio.com/article/screen-readers-display-none.php and*/
/*  *   http://www.w3.org/TR/WCAG-TECHS/H42.html for more information.*/
/*  **/
/*  * @see template_preprocess_links()*/
/*  *//* */
/* #}*/
/* {% if links -%}*/
/*   {%- if heading -%}*/
/*     {% set heading_level = heading.level ? heading.level : 'h2' %}*/
/*     <{{ heading_level }}{{ heading.attributes }}>{{ heading.text }}</{{ heading_level }}>*/
/*   {%- endif -%}*/
/*   <ul{{ attributes }}>*/
/*     {%- for item in links -%}*/
/*       <li{{ item.attributes }}>*/
/*         {%- if item.link -%}*/
/*           <span{{ item.wrapper_attributes }}>{{ item.link }}</span>*/
/*         {%- elseif item.text_attributes -%}*/
/*           <span{{ item.text_attributes }}>{{ item.text }}</span>*/
/*         {%- else -%}*/
/*           <span{{ item.wrapper_attributes }}>{{ item.text }}</span>*/
/*         {%- endif -%}*/
/*       </li>*/
/*     {%- endfor -%}*/
/*   </ul>*/
/* {%- endif %}*/
/* */
