<?php

class __Mustache_06c0ba1eeb71435b63d28fe75d14d1d3 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<li class="ai_top_bar_li ai_top_bar_li_';
        $value = $this->resolveValue($context->find('id'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' ai_top_bar_li_menu_';
        $value = $this->resolveValue($context->find('has_menu'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '">
';
        $buffer .= $indent . '
';
        // 'has_no_menu' section
        $value = $context->find('has_no_menu');
        $buffer .= $this->section752f1f747beb80a281dcd00242021689($context, $indent, $value);
        $buffer .= $indent . '
';
        // 'has_menu' section
        $value = $context->find('has_menu');
        $buffer .= $this->sectionB251b0b3a3cafe6f945529f3bbe36b05($context, $indent, $value);
        $buffer .= $indent . '
';
        // 'has_panels' section
        $value = $context->find('has_panels');
        $buffer .= $this->section111ee8b88d5a63ae3392048788de4a57($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '</li>
';

        return $buffer;
    }

    private function section62b4404864f648ca17c94131467c9e32(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' id="{{id}}"';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' id="';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section36ba8fdd84602349361276a67586419a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' stxt="{{stxt}}"';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' stxt="';
                $value = $this->resolveValue($context->find('stxt'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section38cafcfa1464af0d19169edf12343566(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' rel="{{rel}}"';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' rel="';
                $value = $this->resolveValue($context->find('rel'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF45e9a6285a5e3baaa5576fec4dc137c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' onclick="{{onclick}}"';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' onclick="';
                $value = $this->resolveValue($context->find('onclick'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5595ba37edc5d2114b726398ac887ca8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '<span class="glyphicon glyphicon-{{ glyph }}" aria-hidden="true"></span>';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= '<span class="glyphicon glyphicon-';
                $value = $this->resolveValue($context->find('glyph'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" aria-hidden="true"></span>';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section210a82675005ae574acfb8cd3ce25709(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '<img class="ai_top_bar_menu_img {{img_data_class}}" src="//:0" alt="">';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= '<img class="ai_top_bar_menu_img ';
                $value = $this->resolveValue($context->find('img_data_class'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" src="//:0" alt="">';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0e42aa2820a5e7debbce3040e65cc4e8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '<img class="ai_top_bar_menu_img" src="{{img}}" alt="">';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= '<img class="ai_top_bar_menu_img" src="';
                $value = $this->resolveValue($context->find('img'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" alt="">';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1f4b5a90509408833459b8d881b59827(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '{{btxt}}';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $value = $this->resolveValue($context->find('btxt'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section752f1f747beb80a281dcd00242021689(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
	<a href="{{href}}"{{#id}} id="{{id}}"{{/id}}{{#stxt}} stxt="{{stxt}}"{{/stxt}}{{#rel}} rel="{{rel}}"{{/rel}}{{#onclick}} onclick="{{onclick}}"{{/onclick}}>
		{{# glyph }}<span class="glyphicon glyphicon-{{ glyph }}" aria-hidden="true"></span>{{/ glyph }}
		{{^ glyph }}
			{{#img_data_class}}<img class="ai_top_bar_menu_img {{img_data_class}}" src="//:0" alt="">{{/img_data_class}}
			{{^img_data_class}}{{#img}}<img class="ai_top_bar_menu_img" src="{{img}}" alt="">{{/img}}{{/img_data_class}}
		{{/ glyph }}
		{{#translate}}{{btxt}}{{/translate}}
	</a>
';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '	<a href="';
                $value = $this->resolveValue($context->find('href'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"';
                // 'id' section
                $value = $context->find('id');
                $buffer .= $this->section62b4404864f648ca17c94131467c9e32($context, $indent, $value);
                // 'stxt' section
                $value = $context->find('stxt');
                $buffer .= $this->section36ba8fdd84602349361276a67586419a($context, $indent, $value);
                // 'rel' section
                $value = $context->find('rel');
                $buffer .= $this->section38cafcfa1464af0d19169edf12343566($context, $indent, $value);
                // 'onclick' section
                $value = $context->find('onclick');
                $buffer .= $this->sectionF45e9a6285a5e3baaa5576fec4dc137c($context, $indent, $value);
                $buffer .= '>
';
                $buffer .= $indent . '		';
                // 'glyph' section
                $value = $context->find('glyph');
                $buffer .= $this->section5595ba37edc5d2114b726398ac887ca8($context, $indent, $value);
                $buffer .= '
';
                // 'glyph' inverted section
                $value = $context->find('glyph');
                if (empty($value)) {
                    
                    $buffer .= $indent . '			';
                    // 'img_data_class' section
                    $value = $context->find('img_data_class');
                    $buffer .= $this->section210a82675005ae574acfb8cd3ce25709($context, $indent, $value);
                    $buffer .= '
';
                    $buffer .= $indent . '			';
                    // 'img_data_class' inverted section
                    $value = $context->find('img_data_class');
                    if (empty($value)) {
                        
                        // 'img' section
                        $value = $context->find('img');
                        $buffer .= $this->section0e42aa2820a5e7debbce3040e65cc4e8($context, $indent, $value);
                    }
                    $buffer .= '
';
                }
                $buffer .= $indent . '		';
                // 'translate' section
                $value = $context->find('translate');
                $buffer .= $this->section1f4b5a90509408833459b8d881b59827($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '	</a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA39c290bd65823dc852ccb677a4fe186(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '{{>nested}}';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                if ($partial = $this->mustache->loadPartial('nested')) {
                    $buffer .= $partial->renderInternal($context, $indent . '');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB251b0b3a3cafe6f945529f3bbe36b05(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
	<span class="nohref">{{#translate}}{{btxt}}{{/translate}}</span>
	<ul class="nested_level">{{#menu}}{{>nested}}{{/menu}}</ul>
';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '	<span class="nohref">';
                // 'translate' section
                $value = $context->find('translate');
                $buffer .= $this->section1f4b5a90509408833459b8d881b59827($context, $indent, $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '	<ul class="nested_level">';
                // 'menu' section
                $value = $context->find('menu');
                $buffer .= $this->sectionA39c290bd65823dc852ccb677a4fe186($context, $indent, $value);
                $buffer .= '</ul>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section56fe49120177b738b1e7aa61a3976d7d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
		<div class="ai_top_bar_panel">
			<ul class="nested_level">{{#menu}}{{>nested}}{{/menu}}</ul>
		</div>
		';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '		<div class="ai_top_bar_panel">
';
                $buffer .= $indent . '			<ul class="nested_level">';
                // 'menu' section
                $value = $context->find('menu');
                $buffer .= $this->sectionA39c290bd65823dc852ccb677a4fe186($context, $indent, $value);
                $buffer .= '</ul>
';
                $buffer .= $indent . '		</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section111ee8b88d5a63ae3392048788de4a57(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
	<span class="nohref">{{#translate}}{{btxt}}{{/translate}}</span>
	<div class="ai_top_bar_panels">
		{{#panels}}
		<div class="ai_top_bar_panel">
			<ul class="nested_level">{{#menu}}{{>nested}}{{/menu}}</ul>
		</div>
		{{/panels}}
	</div>
';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '	<span class="nohref">';
                // 'translate' section
                $value = $context->find('translate');
                $buffer .= $this->section1f4b5a90509408833459b8d881b59827($context, $indent, $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '	<div class="ai_top_bar_panels">
';
                // 'panels' section
                $value = $context->find('panels');
                $buffer .= $this->section56fe49120177b738b1e7aa61a3976d7d($context, $indent, $value);
                $buffer .= $indent . '	</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
