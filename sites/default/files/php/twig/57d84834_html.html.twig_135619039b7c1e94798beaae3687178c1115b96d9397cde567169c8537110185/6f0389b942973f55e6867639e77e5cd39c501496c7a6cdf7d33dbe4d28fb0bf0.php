<?php

/* themes/custom/mta/templates/layout/html.html.twig */
class __TwigTemplate_f1e4c195421da4405c567be74dd7eefaa0aba81ade2c5c984984eab2199b3c74 extends Twig_Template
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
        $tags = array("if" => 34, "set" => 45);
        $filters = array("raw" => 32, "safe_join" => 40, "clean_class" => 48, "without" => 57, "t" => 59);
        $functions = array("attach_library" => 26);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'set'),
                array('raw', 'safe_join', 'clean_class', 'without', 't'),
                array('attach_library')
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
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->attachLibrary("at_core/at.fastclick_initialize"), "html", null, true));
        // line 27
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->attachLibrary("at_core/at.breakpoints"), "html", null, true));
        // line 28
        echo "<!DOCTYPE html>
<html";
        // line 29
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["html_attributes"]) ? $context["html_attributes"] : null), "addClass", array(0 => "no-js", 1 => "adaptivetheme"), "method"), "html", null, true));
        echo ">
  <head>
    ";
        // line 31
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["touch_icons"]) ? $context["touch_icons"] : null), "html", null, true));
        echo "
    <head-placeholder token=\"";
        // line 32
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
    <link rel=\"dns-prefetch\" href=\"//cdnjs.cloudflare.com\">";
        // line 34
        if ((isset($context["google_dns_prefetch"]) ? $context["google_dns_prefetch"] : null)) {
            // line 35
            echo "<link rel=\"dns-prefetch\" href=\"//fonts.googleapis.com\">";
        }
        // line 37
        if ((isset($context["typekit_dns_prefetch"]) ? $context["typekit_dns_prefetch"] : null)) {
            // line 38
            echo "<link rel=\"dns-prefetch\" href=\"//use.typekit.net\">";
        }
        // line 40
        echo "<title>";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('drupal_core')->safeJoin($this->env, (isset($context["head_title"]) ? $context["head_title"] : null), " | ")));
        echo "</title>
    <css-placeholder token=\"";
        // line 41
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
    <js-placeholder token=\"";
        // line 42
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
  </head>";
        // line 45
        $context["body_classes"] = array(0 => ((        // line 46
(isset($context["logged_in"]) ? $context["logged_in"] : null)) ? ("user-logged-in") : ("user-logged-out")), 1 => ((        // line 47
(isset($context["is_front"]) ? $context["is_front"] : null)) ? ("path-frontpage") : ("path-not-frontpage")), 2 => ((        // line 48
(isset($context["root_path"]) ? $context["root_path"] : null)) ? (("path-" . \Drupal\Component\Utility\Html::getClass((isset($context["root_path"]) ? $context["root_path"] : null)))) : ("")), 3 => (($this->getAttribute(        // line 49
(isset($context["path_info"]) ? $context["path_info"] : null), "args", array())) ? (("path-" . $this->getAttribute((isset($context["path_info"]) ? $context["path_info"] : null), "args", array()))) : ("")), 4 => (($this->getAttribute(        // line 50
(isset($context["path_info"]) ? $context["path_info"] : null), "query", array())) ? (("path-query-" . $this->getAttribute((isset($context["path_info"]) ? $context["path_info"] : null), "query", array()))) : ("")), 5 => ((        // line 51
(isset($context["node_type"]) ? $context["node_type"] : null)) ? (("page-node-type--" . \Drupal\Component\Utility\Html::getClass((isset($context["node_type"]) ? $context["node_type"] : null)))) : ("")), 6 => (($this->getAttribute(        // line 52
(isset($context["head_title_array"]) ? $context["head_title_array"] : null), "name", array())) ? (("site-name--" . \Drupal\Component\Utility\Html::getClass($this->getAttribute((isset($context["head_title_array"]) ? $context["head_title_array"] : null), "name", array())))) : ("")), 7 => (($this->getAttribute(        // line 53
(isset($context["theme"]) ? $context["theme"] : null), "name", array())) ? (("theme-name--" . \Drupal\Component\Utility\Html::getClass($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "name", array())))) : ("")), 8 => ((        // line 54
(isset($context["db_offline"]) ? $context["db_offline"] : null)) ? ("db-offline") : ("")));
        // line 57
        echo "<body role=\"document\"";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["body_classes"]) ? $context["body_classes"] : null)), "method"), "role"), "html", null, true));
        echo ">
    ";
        // line 59
        echo "    <a href=\"";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["skip_link_target"]) ? $context["skip_link_target"] : null), "html", null, true));
        echo "\" class=\"visually-hidden focusable skip-link\">";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Skip to main content")));
        echo "</a>
    ";
        // line 60
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page_top"]) ? $context["page_top"] : null), "html", null, true));
        echo "
    ";
        // line 61
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page"]) ? $context["page"] : null), "html", null, true));
        echo "
    ";
        // line 62
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["page_bottom"]) ? $context["page_bottom"] : null), "html", null, true));
        echo "
    <js-bottom-placeholder token=\"";
        // line 63
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["placeholder_token"]) ? $context["placeholder_token"] : null)));
        echo "\">
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/mta/templates/layout/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 63,  117 => 62,  113 => 61,  109 => 60,  102 => 59,  97 => 57,  95 => 54,  94 => 53,  93 => 52,  92 => 51,  91 => 50,  90 => 49,  89 => 48,  88 => 47,  87 => 46,  86 => 45,  82 => 42,  78 => 41,  73 => 40,  70 => 38,  68 => 37,  65 => 35,  63 => 34,  59 => 32,  55 => 31,  50 => 29,  47 => 28,  45 => 27,  43 => 26,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for the basic structure of a single Drupal page.*/
/*  **/
/*  * Variables:*/
/*  * - logged_in: A flag indicating if user is logged in.*/
/*  * - root_path: The root path of the current page (e.g., node, admin, user).*/
/*  * - node_type: The content type for the current node, if the page is a node.*/
/*  * - head_title: List of text elements that make up the head_title variable.*/
/*  *   May contain or more of the following:*/
/*  *   - title: The title of the page.*/
/*  *   - name: The name of the site.*/
/*  *   - slogan: The slogan of the site.*/
/*  * - page_top: Initial rendered markup. This should be printed before 'page'.*/
/*  * - page: The rendered page markup.*/
/*  * - page_bottom: Closing rendered markup. This variable should be printed after*/
/*  *   'page'.*/
/*  * - db_offline: A flag indicating if the database is offline.*/
/*  * - placeholder_token: The token for generating head, css, js and js-bottom*/
/*  *   placeholders.*/
/*  **/
/*  * @see template_preprocess_html()*/
/*  *//* */
/* #}*/
/* {{- attach_library('at_core/at.fastclick_initialize') -}}*/
/* {{- attach_library('at_core/at.breakpoints') -}}*/
/* <!DOCTYPE html>*/
/* <html{{ html_attributes.addClass('no-js', 'adaptivetheme') }}>*/
/*   <head>*/
/*     {{ touch_icons }}*/
/*     <head-placeholder token="{{ placeholder_token|raw }}">*/
/*     <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">*/
/*     {%- if google_dns_prefetch -%}*/
/*       <link rel="dns-prefetch" href="//fonts.googleapis.com">*/
/*     {%- endif -%}*/
/*     {%- if typekit_dns_prefetch -%}*/
/*       <link rel="dns-prefetch" href="//use.typekit.net">*/
/*     {%- endif -%}*/
/*     <title>{{ head_title|safe_join(' | ') }}</title>*/
/*     <css-placeholder token="{{ placeholder_token|raw }}">*/
/*     <js-placeholder token="{{ placeholder_token|raw }}">*/
/*   </head>*/
/*   {%-*/
/*     set body_classes = [*/
/*       logged_in ? 'user-logged-in' : 'user-logged-out',*/
/*       is_front ? 'path-frontpage' : 'path-not-frontpage',*/
/*       root_path ? 'path-' ~ root_path|clean_class,*/
/*       path_info.args ? 'path-' ~ path_info.args,*/
/*       path_info.query ? 'path-query-' ~ path_info.query,*/
/*       node_type ? 'page-node-type--' ~ node_type|clean_class,*/
/*       head_title_array.name ? 'site-name--' ~ head_title_array.name|clean_class,*/
/*       theme.name ? 'theme-name--' ~ theme.name|clean_class,*/
/*       db_offline ? 'db-offline',*/
/*     ]*/
/*   -%}*/
/*   <body role="document"{{ attributes.addClass(body_classes)|without('role') }}>*/
/*     {# Keyboard navigation/accessibility links to content in page.html.twig. #}*/
/*     <a href="{{ skip_link_target }}" class="visually-hidden focusable skip-link">{{ 'Skip to main content'|t }}</a>*/
/*     {{ page_top }}*/
/*     {{ page }}*/
/*     {{ page_bottom }}*/
/*     <js-bottom-placeholder token="{{ placeholder_token|raw }}">*/
/*   </body>*/
/* </html>*/
/* */
