<?php

class __Mustache_4913635dbc97c82754acaafc48c0eeaa extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<table class="table table-condensed table-hover perm-table">
';
        $buffer .= $indent . '	<thead>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<th>&nbsp;</th>
';
        // 'groups' section
        $value = $context->find('groups');
        $buffer .= $this->section56c08295326bae29e67e1ff0dd809be8($context, $indent, $value);
        $buffer .= $indent . '			<th>&nbsp;</th>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '	</thead>
';
        $buffer .= $indent . '	<tbody>
';
        // 'types' section
        $value = $context->find('types');
        $buffer .= $this->sectionCf945e9a8748191e96e147d947089cc7($context, $indent, $value);
        $buffer .= $indent . '	</tbody>
';
        $buffer .= $indent . '</table>';

        return $buffer;
    }

    private function section56c08295326bae29e67e1ff0dd809be8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
			<th class="group-name"><div title="{{ group_name }}">{{ group_name }}</div></th>
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
                $buffer .= $indent . '			<th class="group-name"><div title="';
                $value = $this->resolveValue($context->find('group_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">';
                $value = $this->resolveValue($context->find('group_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</div></th>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7bbcf5ec5fa3787f0f7fe99fc74a1aff(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
			<th class="mini-group" title="{{ group_name }}">{{ mini_name }}</th>
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
                $buffer .= $indent . '			<th class="mini-group" title="';
                $value = $this->resolveValue($context->find('group_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">';
                $value = $this->resolveValue($context->find('mini_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</th>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8e7f3259d467e774976a4aa45c9da28f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
		<tr>
			<th class="mini-group">&nbsp;</th>
			{{# groups }}
			<th class="mini-group" title="{{ group_name }}">{{ mini_name }}</th>
			{{/ groups }}
			<th class="mini-group">&nbsp;</th>
		</tr>
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
                $buffer .= $indent . '		<tr>
';
                $buffer .= $indent . '			<th class="mini-group">&nbsp;</th>
';
                // 'groups' section
                $value = $context->find('groups');
                $buffer .= $this->section7bbcf5ec5fa3787f0f7fe99fc74a1aff($context, $indent, $value);
                $buffer .= $indent . '			<th class="mini-group">&nbsp;</th>
';
                $buffer .= $indent . '		</tr>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBcf6b099e594fb718363716b6a35519d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' : {{ . }}';
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
                $buffer .= ' : ';
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9279b675c2c23e584d4706aa316b62a7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
			<td class="group-check" title="{{ type_name }} &mdash; {{ group_name }}" id="check-{{ class_id }}-{{ type_id }}-{{ key_id }}-{{ id }}">
				{{> checkbox }}
			</td>
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
                $buffer .= $indent . '			<td class="group-check" title="';
                $value = $this->resolveValue($context->find('type_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ' &mdash; ';
                $value = $this->resolveValue($context->find('group_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" id="check-';
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
                $buffer .= '">
';
                if ($partial = $this->mustache->loadPartial('checkbox')) {
                    $buffer .= $partial->renderInternal($context, $indent . '				');
                }
                $buffer .= $indent . '			</td>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2469ad6fa0cd3f07df2309189aa65bac(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<a class="action"
					data-method="DELETE"
					data-confirm="Are you sure you want to delete the permission &quot;{{ class_name }}.{{ type_name }}&quot;?"
					href="permission_manager/delete-type/{{ class_name }}/{{ type_name }}/{{ key_value }}">
					<span class="glyphicon glyphicon-trash"></span>
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
                $buffer .= $indent . '				<a class="action"
';
                $buffer .= $indent . '					data-method="DELETE"
';
                $buffer .= $indent . '					data-confirm="Are you sure you want to delete the permission &quot;';
                $value = $this->resolveValue($context->find('class_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '.';
                $value = $this->resolveValue($context->find('type_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '&quot;?"
';
                $buffer .= $indent . '					href="permission_manager/delete-type/';
                $value = $this->resolveValue($context->find('class_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '/';
                $value = $this->resolveValue($context->find('type_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '/';
                $value = $this->resolveValue($context->find('key_value'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                $buffer .= $indent . '					<span class="glyphicon glyphicon-trash"></span>
';
                $buffer .= $indent . '				</a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCf945e9a8748191e96e147d947089cc7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
		{{# show_group_headers_again }}
		<tr>
			<th class="mini-group">&nbsp;</th>
			{{# groups }}
			<th class="mini-group" title="{{ group_name }}">{{ mini_name }}</th>
			{{/ groups }}
			<th class="mini-group">&nbsp;</th>
		</tr>
		{{/ show_group_headers_again }}
		<tr id="perm-type-{{ class_id }}-{{ type_id }}-{{ key_id }}">
			<th class="perm-class">{{ type_name }}{{# key_value }} : {{ . }}{{/ key_value }}</th>
			{{# groups }}
			<td class="group-check" title="{{ type_name }} &mdash; {{ group_name }}" id="check-{{ class_id }}-{{ type_id }}-{{ key_id }}-{{ id }}">
				{{> checkbox }}
			</td>
			{{/ groups }}
			<td>
				&emsp;
				{{# can_delete_type }}
				<a class="action"
					data-method="DELETE"
					data-confirm="Are you sure you want to delete the permission &quot;{{ class_name }}.{{ type_name }}&quot;?"
					href="permission_manager/delete-type/{{ class_name }}/{{ type_name }}/{{ key_value }}">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
				{{/ can_delete_type }}
			</td>
		</tr>
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
                // 'show_group_headers_again' section
                $value = $context->find('show_group_headers_again');
                $buffer .= $this->section8e7f3259d467e774976a4aa45c9da28f($context, $indent, $value);
                $buffer .= $indent . '		<tr id="perm-type-';
                $value = $this->resolveValue($context->find('class_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '-';
                $value = $this->resolveValue($context->find('type_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '-';
                $value = $this->resolveValue($context->find('key_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                $buffer .= $indent . '			<th class="perm-class">';
                $value = $this->resolveValue($context->find('type_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                // 'key_value' section
                $value = $context->find('key_value');
                $buffer .= $this->sectionBcf6b099e594fb718363716b6a35519d($context, $indent, $value);
                $buffer .= '</th>
';
                // 'groups' section
                $value = $context->find('groups');
                $buffer .= $this->section9279b675c2c23e584d4706aa316b62a7($context, $indent, $value);
                $buffer .= $indent . '			<td>
';
                $buffer .= $indent . '				&emsp;
';
                // 'can_delete_type' section
                $value = $context->find('can_delete_type');
                $buffer .= $this->section2469ad6fa0cd3f07df2309189aa65bac($context, $indent, $value);
                $buffer .= $indent . '			</td>
';
                $buffer .= $indent . '		</tr>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
