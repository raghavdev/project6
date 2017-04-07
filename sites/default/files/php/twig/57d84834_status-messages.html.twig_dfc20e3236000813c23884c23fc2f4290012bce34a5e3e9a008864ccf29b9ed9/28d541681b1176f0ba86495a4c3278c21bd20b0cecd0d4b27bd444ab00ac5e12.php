<?php

/* themes/custom/mta/templates/misc/status-messages.html.twig */
class __TwigTemplate_ebc75cb4b6fd0b3139c0d44d3b042d3a90b0f44cdd4e65467b07bf89b99f9214 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'messages' => array($this, 'block_messages'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("block" => 26, "for" => 27, "set" => 28, "if" => 30);
        $filters = array("without" => 29, "length" => 38, "first" => 45);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('block', 'for', 'set', 'if'),
                array('without', 'length', 'first'),
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

        // line 26
        $this->displayBlock('messages', $context, $blocks);
    }

    public function block_messages($context, array $blocks = array())
    {
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["message_list"]) ? $context["message_list"] : null));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 28
            $context["classes"] = array(0 => "messages", 1 => ("messages--" . $context["type"]));
            // line 29
            echo "<div role=\"contentinfo\" aria-label=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["status_headings"]) ? $context["status_headings"] : null), $context["type"], array(), "array"), "html", null, true));
            echo "\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "role", "aria-label"), "html", null, true));
            echo ">
      <div class=\"messages__container\"";
            // line 30
            if (($context["type"] == "error")) {
                echo " role=\"alert\"";
            }
            echo ">";
            // line 32
            if ($this->getAttribute((isset($context["status_headings"]) ? $context["status_headings"] : null), $context["type"], array(), "array")) {
                // line 33
                echo "<h2 class=\"visually-hidden\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["status_headings"]) ? $context["status_headings"] : null), $context["type"], array(), "array"), "html", null, true));
                echo "</h2>";
            }
            // line 36
            echo "<span class=\"icon icon-";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["type"], "html", null, true));
            echo "\" aria-hidden=\"true\"></span>";
            // line 38
            if ((twig_length_filter($this->env, $context["messages"]) > 1)) {
                // line 39
                echo "<ul class=\"messages__list\">";
                // line 40
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["messages"]);
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 41
                    echo "<li class=\"messages__item\">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["message"], "html", null, true));
                    echo "</li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 43
                echo "</ul>";
            } else {
                // line 45
                echo "<div class=\"messages__list\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_first($this->env, $context["messages"]), "html", null, true));
                echo "</div>";
            }
            // line 48
            echo "</div>
    </div>
    ";
            // line 51
            $context["attributes"] = $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "removeClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "themes/custom/mta/templates/misc/status-messages.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  107 => 51,  103 => 48,  98 => 45,  95 => 43,  87 => 41,  83 => 40,  81 => 39,  79 => 38,  75 => 36,  70 => 33,  68 => 32,  63 => 30,  56 => 29,  54 => 28,  50 => 27,  44 => 26,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for status messages.*/
/*  **/
/*  * Displays status, error, and warning messages, grouped by type.*/
/*  **/
/*  * An invisible heading identifies the messages for assistive technology.*/
/*  * Sighted users see a colored box. See http://www.w3.org/TR/WCAG-TECHS/H69.html*/
/*  * for info.*/
/*  **/
/*  * Add an ARIA label to the contentinfo area so that assistive technology*/
/*  * user agents will better describe this landmark.*/
/*  **/
/*  * Available variables:*/
/*  * - message_list: List of messages to be displayed, grouped by type.*/
/*  * - status_headings: List of all status types.*/
/*  * - display: (optional) May have a value of 'status' or 'error' when only*/
/*  *   displaying messages of that specific type.*/
/*  * - attributes: HTML attributes for the element, including:*/
/*  *   - class: HTML classes.*/
/*  **/
/*  * @see template_preprocess_status_messages()*/
/*  *//* */
/* #}*/
/* {% block messages %}*/
/*   {%- for type, messages in message_list -%}*/
/*     {%- set classes = ['messages', 'messages--' ~ type] -%}*/
/*     <div role="contentinfo" aria-label="{{- status_headings[type] -}}"{{ attributes.addClass(classes)|without('role', 'aria-label') }}>*/
/*       <div class="messages__container"{% if type == 'error' %} role="alert"{% endif %}>*/
/* */
/*         {%- if status_headings[type] -%}*/
/*           <h2 class="visually-hidden">{{- status_headings[type] -}}</h2>*/
/*         {%- endif -%}*/
/* */
/*         <span class="icon icon-{{- type -}}" aria-hidden="true"></span>*/
/* */
/*         {%- if messages|length > 1 -%}*/
/*           <ul class="messages__list">*/
/*             {%- for message in messages -%}*/
/*               <li class="messages__item">{{- message -}}</li>*/
/*             {%- endfor -%}*/
/*           </ul>*/
/*         {%- else -%}*/
/*           <div class="messages__list">{{- messages|first -}}</div>*/
/*         {%- endif -%}*/
/* */
/*       </div>*/
/*     </div>*/
/*     {# Remove type specific classes. #}*/
/*     {%- set attributes = attributes.removeClass(classes) -%}*/
/*   {%- endfor -%}*/
/* {% endblock messages %}*/
/* */
