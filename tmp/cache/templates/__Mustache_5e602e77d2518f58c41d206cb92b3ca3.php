<?php

class __Mustache_5e602e77d2518f58c41d206cb92b3ca3 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        // 'perm_classes' section
        $value = $context->find('perm_classes');
        $buffer .= $this->sectionE87fa37fd1d5b860a1c4a26bd974d548($context, $indent, $value);
        $buffer .= $indent . '
';

        return $buffer;
    }

    private function sectionCd88b134b5b3ad20d64d984312454408(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
	<input type="checkbox" name="perm_classes[]" value="{{ id }}">
	&emsp;
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
                $buffer .= $indent . '	<input type="checkbox" name="perm_classes[]" value="';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                $buffer .= $indent . '	&emsp;
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF53fa77b6a044e758eb693d354b7476b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
	<span class="badge">
		<a class="action"
			data-method="DELETE"
			data-confirm="Are you sure you want to delete the class &quot;{{ class_name }}&quot;?"
			data-loading-target="perm-class-loading-{{ id }}"
			href="permission_manager/delete-class/{{ class_name }}/{{ id }}">
			Delete
		</a>
	</span>
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
                $buffer .= $indent . '	<span class="badge">
';
                $buffer .= $indent . '		<a class="action"
';
                $buffer .= $indent . '			data-method="DELETE"
';
                $buffer .= $indent . '			data-confirm="Are you sure you want to delete the class &quot;';
                $value = $this->resolveValue($context->find('class_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '&quot;?"
';
                $buffer .= $indent . '			data-loading-target="perm-class-loading-';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"
';
                $buffer .= $indent . '			href="permission_manager/delete-class/';
                $value = $this->resolveValue($context->find('class_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '/';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                $buffer .= $indent . '			Delete
';
                $buffer .= $indent . '		</a>
';
                $buffer .= $indent . '	</span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section329a06c3d226afa70f2ad27cfbf43674(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
	<span class="badge">
		<a class="action"
			data-loading-target="perm-class-loading-{{ id }}"
			data-callback="goto_export_output"
			href="permission_manager/export/{{ id }}">
			Export
		</a>
	</span>
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
                $buffer .= $indent . '	<span class="badge">
';
                $buffer .= $indent . '		<a class="action"
';
                $buffer .= $indent . '			data-loading-target="perm-class-loading-';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"
';
                $buffer .= $indent . '			data-callback="goto_export_output"
';
                $buffer .= $indent . '			href="permission_manager/export/';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                $buffer .= $indent . '			Export
';
                $buffer .= $indent . '		</a>
';
                $buffer .= $indent . '	</span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section96d8f24c300e77650ae8010943ed50a0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
<li class="list-group-item" id="list-group-item-{{ id }}">
	{{# can_export }}
	<input type="checkbox" name="perm_classes[]" value="{{ id }}">
	&emsp;
	{{/ can_export }}
	<a class="action" href="permission_manager/show/{{ id }}" data-callforward="class_toggle" data-id="{{ id }}" data-opened="0" data-loading-target="perm-class-loading-{{ id }}">{{ class_name }}</a>
	<span id="perm-class-loading-{{ id }}" class="loading-target"></span>
	{{# can_delete_class }}
	<span class="badge">
		<a class="action"
			data-method="DELETE"
			data-confirm="Are you sure you want to delete the class &quot;{{ class_name }}&quot;?"
			data-loading-target="perm-class-loading-{{ id }}"
			href="permission_manager/delete-class/{{ class_name }}/{{ id }}">
			Delete
		</a>
	</span>
	{{/ can_delete_class }}
	{{# can_export }}
	<span class="badge">
		<a class="action"
			data-loading-target="perm-class-loading-{{ id }}"
			data-callback="goto_export_output"
			href="permission_manager/export/{{ id }}">
			Export
		</a>
	</span>
	{{/ can_export }}
	<div id="perm-table-container-{{ id }}" class="perm-table-container"></div>
</li>
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
                $buffer .= $indent . '<li class="list-group-item" id="list-group-item-';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                // 'can_export' section
                $value = $context->find('can_export');
                $buffer .= $this->sectionCd88b134b5b3ad20d64d984312454408($context, $indent, $value);
                $buffer .= $indent . '	<a class="action" href="permission_manager/show/';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" data-callforward="class_toggle" data-id="';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" data-opened="0" data-loading-target="perm-class-loading-';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">';
                $value = $this->resolveValue($context->find('class_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</a>
';
                $buffer .= $indent . '	<span id="perm-class-loading-';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" class="loading-target"></span>
';
                // 'can_delete_class' section
                $value = $context->find('can_delete_class');
                $buffer .= $this->sectionF53fa77b6a044e758eb693d354b7476b($context, $indent, $value);
                // 'can_export' section
                $value = $context->find('can_export');
                $buffer .= $this->section329a06c3d226afa70f2ad27cfbf43674($context, $indent, $value);
                $buffer .= $indent . '	<div id="perm-table-container-';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" class="perm-table-container"></div>
';
                $buffer .= $indent . '</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE87fa37fd1d5b860a1c4a26bd974d548(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '{{# class_name }}
<li class="list-group-item" id="list-group-item-{{ id }}">
	{{# can_export }}
	<input type="checkbox" name="perm_classes[]" value="{{ id }}">
	&emsp;
	{{/ can_export }}
	<a class="action" href="permission_manager/show/{{ id }}" data-callforward="class_toggle" data-id="{{ id }}" data-opened="0" data-loading-target="perm-class-loading-{{ id }}">{{ class_name }}</a>
	<span id="perm-class-loading-{{ id }}" class="loading-target"></span>
	{{# can_delete_class }}
	<span class="badge">
		<a class="action"
			data-method="DELETE"
			data-confirm="Are you sure you want to delete the class &quot;{{ class_name }}&quot;?"
			data-loading-target="perm-class-loading-{{ id }}"
			href="permission_manager/delete-class/{{ class_name }}/{{ id }}">
			Delete
		</a>
	</span>
	{{/ can_delete_class }}
	{{# can_export }}
	<span class="badge">
		<a class="action"
			data-loading-target="perm-class-loading-{{ id }}"
			data-callback="goto_export_output"
			href="permission_manager/export/{{ id }}">
			Export
		</a>
	</span>
	{{/ can_export }}
	<div id="perm-table-container-{{ id }}" class="perm-table-container"></div>
</li>
{{/ class_name }}';
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
                // 'class_name' section
                $value = $context->find('class_name');
                $buffer .= $this->section96d8f24c300e77650ae8010943ed50a0($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
