<?php

class __Mustache_d5958b4f3e28708129342462a14c10eb extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        // 'menu_items' section
        $value = $context->find('menu_items');
        $buffer .= $this->section96e156b3014913bb6772845cc88745dd($context, $indent, $value);

        return $buffer;
    }

    private function sectionFb8f874e28708a4ea9284f7d8873063f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = 'list-group-item-danger';
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
                $buffer .= 'list-group-item-danger';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5749c750acb0d7477dd5257d00cc6d53(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = 'active';
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
                $buffer .= 'active';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section15a401e33cfbfd5e21423343ddc44d46(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
		<span class="glyphicon glyphicon-{{ . }}" aria-hidden="true"></span>
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
                $buffer .= $indent . '		<span class="glyphicon glyphicon-';
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" aria-hidden="true"></span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section11521d8f1952e447508f1211fbaf9d82(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
		<img src="{{ . }}" alt="">
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
                $buffer .= '
';
                $buffer .= $indent . '		<img src="';
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" alt="">
';
                $buffer .= $indent . '		';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section88c2b370cee1061abee3b3abcd6fdbcf(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '<span class="badge">{{ . }}</span>';
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
                $buffer .= '<span class="badge">';
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</span>';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section847e247a897c37392e5bc6ee473d3686(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
	<a class="list-group-item {{# display_disabled }}list-group-item-danger{{/ display_disabled }} {{# hilite }}active{{/ hilite }} action" id="item-{{ id }}" href="top-bar-customize/open/{{ id }}">
		{{# glyph }}
		<span class="glyphicon glyphicon-{{ . }}" aria-hidden="true"></span>
		{{/ glyph }}
		{{^ glyph }}{{# imgsrc }}
		<img src="{{ . }}" alt="">
		{{/ imgsrc }}{{/ glyph }}
		{{ name }}
		{{# sub_cats }}<span class="badge">{{ . }}</span>{{/ sub_cats }}
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
                $buffer .= $indent . '	<a class="list-group-item ';
                // 'display_disabled' section
                $value = $context->find('display_disabled');
                $buffer .= $this->sectionFb8f874e28708a4ea9284f7d8873063f($context, $indent, $value);
                $buffer .= ' ';
                // 'hilite' section
                $value = $context->find('hilite');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= ' action" id="item-';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" href="top-bar-customize/open/';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                // 'glyph' section
                $value = $context->find('glyph');
                $buffer .= $this->section15a401e33cfbfd5e21423343ddc44d46($context, $indent, $value);
                $buffer .= $indent . '		';
                // 'glyph' inverted section
                $value = $context->find('glyph');
                if (empty($value)) {
                    
                    // 'imgsrc' section
                    $value = $context->find('imgsrc');
                    $buffer .= $this->section11521d8f1952e447508f1211fbaf9d82($context, $indent, $value);
                }
                $buffer .= '
';
                $buffer .= $indent . '		';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '
';
                $buffer .= $indent . '		';
                // 'sub_cats' section
                $value = $context->find('sub_cats');
                $buffer .= $this->section88c2b370cee1061abee3b3abcd6fdbcf($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '	</a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section96e156b3014913bb6772845cc88745dd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
<h3 class="list-group-header">{{ name }}</h3>
<div class="list-group">
	{{# sub_items }}
	<a class="list-group-item {{# display_disabled }}list-group-item-danger{{/ display_disabled }} {{# hilite }}active{{/ hilite }} action" id="item-{{ id }}" href="top-bar-customize/open/{{ id }}">
		{{# glyph }}
		<span class="glyphicon glyphicon-{{ . }}" aria-hidden="true"></span>
		{{/ glyph }}
		{{^ glyph }}{{# imgsrc }}
		<img src="{{ . }}" alt="">
		{{/ imgsrc }}{{/ glyph }}
		{{ name }}
		{{# sub_cats }}<span class="badge">{{ . }}</span>{{/ sub_cats }}
	</a>
	{{/ sub_items }}
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
                $buffer .= $indent . '<h3 class="list-group-header">';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</h3>
';
                $buffer .= $indent . '<div class="list-group">
';
                // 'sub_items' section
                $value = $context->find('sub_items');
                $buffer .= $this->section847e247a897c37392e5bc6ee473d3686($context, $indent, $value);
                $buffer .= $indent . '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
