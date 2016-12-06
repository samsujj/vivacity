<?php

class __Mustache_20b852267b61fe9972cc65fb961ae40a extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<a  class="action"
';
        $buffer .= $indent . '	data-callforward="disable_action_grant"
';
        $buffer .= $indent . '	data-method="POST"
';
        $buffer .= $indent . '	data-class="';
        $value = $this->resolveValue($context->find('class_name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '"
';
        $buffer .= $indent . '	data-type="';
        $value = $this->resolveValue($context->find('type_name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '"
';
        $buffer .= $indent . '	data-key="';
        $value = $this->resolveValue($context->find('key_value'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '"
';
        $buffer .= $indent . '	data-group="';
        $value = $this->resolveValue($context->find('id'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '"
';
        $buffer .= $indent . '	';
        // 'target' section
        $value = $context->find('target');
        $buffer .= $this->sectionCafa49b624889865d1f0ed72e1a0e685($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '	';
        // 'target' inverted section
        $value = $context->find('target');
        if (empty($value)) {
            
            $buffer .= 'data-target="check-';
            $value = $this->resolveValue($context->find('class_id'), $context, $indent);
            $buffer .= htmlspecialchars($value, 2, 'UTF-8');
            $buffer .= '-';
            $value = $this->resolveValue($context->find('type_id'), $context, $indent);
            $buffer .= htmlspecialchars($value, 2, 'UTF-8');
            $buffer .= '-';
            $value = $this->resolveValue($context->find('key_id'), $context, $indent);
            $buffer .= htmlspecialchars($value, 2, 'UTF-8');
            $buffer .= '-';
            $value = $this->resolveValue($context->find('id'), $context, $indent);
            $buffer .= htmlspecialchars($value, 2, 'UTF-8');
            $buffer .= '"';
        }
        $buffer .= '
';
        $buffer .= $indent . '	href="permission_manager/';
        // 'granted' section
        $value = $context->find('granted');
        $buffer .= $this->section41a740fb9b3a2ea9bd819a36e744fbe4($context, $indent, $value);
        // 'granted' inverted section
        $value = $context->find('granted');
        if (empty($value)) {
            
            $buffer .= 'grant';
        }
        $buffer .= '">
';
        $buffer .= $indent . '	<span class="glyphicon glyphicon-';
        // 'granted' section
        $value = $context->find('granted');
        $buffer .= $this->sectionBffcc11c55b131e93962e74edf8be01e($context, $indent, $value);
        // 'granted' inverted section
        $value = $context->find('granted');
        if (empty($value)) {
            
            $buffer .= 'minus';
        }
        $buffer .= ' perm-status"></span>
';
        $buffer .= $indent . '</a>
';

        return $buffer;
    }

    private function sectionCafa49b624889865d1f0ed72e1a0e685(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = 'data-target="{{ . }}"';
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
                $buffer .= 'data-target="';
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section41a740fb9b3a2ea9bd819a36e744fbe4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = 'deny';
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
                $buffer .= 'deny';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBffcc11c55b131e93962e74edf8be01e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = 'ok';
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
                $buffer .= 'ok';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
