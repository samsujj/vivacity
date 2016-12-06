<?php

class __Mustache_ddcc07f821618e27dd01f407d5e805f5 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="row">
';
        $buffer .= $indent . '	<div class="col-sm-8 col-sm-offset-2">
';
        // 'id' section
        $value = $context->find('id');
        $buffer .= $this->sectionBe005e9990580aeaa1f09c8d3bff5a2b($context, $indent, $value);
        $buffer .= $indent . '		';
        // 'id' inverted section
        $value = $context->find('id');
        if (empty($value)) {
            
            $buffer .= '<p><a href="#" class="btn btn-default disabled">New Menu Item</a></p>';
        }
        $buffer .= '
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	<div class="col-sm-2">
';
        $buffer .= $indent . '		';
        // 'id' section
        $value = $context->find('id');
        $buffer .= $this->section1b11611ceaa0c2d01994fb64dce81b89($context, $indent, $value);
        $buffer .= '
';
        // 'id' inverted section
        $value = $context->find('id');
        if (empty($value)) {
            
            $buffer .= $indent . '		<p>
';
            $buffer .= $indent . '			<a href="top-bar-customize/close" class="btn btn-link action" aria-role="button">
';
            $buffer .= $indent . '				<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
';
            $buffer .= $indent . '				Cancel
';
            $buffer .= $indent . '			</a>
';
            $buffer .= $indent . '		</p>
';
        }
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '<form class="form-horizontal action" method="post" action="top-bar-customize/save/';
        // 'id' section
        $value = $context->find('id');
        $buffer .= $this->section6b1c7ca0713c67f3e40a167c2e7d75f7($context, $indent, $value);
        // 'id' inverted section
        $value = $context->find('id');
        if (empty($value)) {
            
            $buffer .= 'new';
        }
        $buffer .= '">
';
        $buffer .= $indent . '	<div class="form-group">
';
        $buffer .= $indent . '		<label for="tb-id" class="col-sm-2 control-label">ID</label>
';
        $buffer .= $indent . '		<div class="col-sm-10">
';
        $buffer .= $indent . '			<input type="text" class="form-control" id="tb-id" name="id" value="';
        $value = $this->resolveValue($context->find('id'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '" placeholder="Ex: my_menu_item" ';
        // 'id' section
        $value = $context->find('id');
        $buffer .= $this->sectionBd6d241829fcbe59e01506b6f6c8d128($context, $indent, $value);
        $buffer .= '>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	
';
        // 'root_form' inverted section
        $value = $context->find('root_form');
        if (empty($value)) {
            
            $buffer .= $indent . '	<div class="form-group">
';
            $buffer .= $indent . '		<label for="tb-parent" class="col-sm-2 control-label">Category</label>
';
            $buffer .= $indent . '		<div class="col-sm-10">
';
            $buffer .= $indent . '			<select class="form-control" id="tb-parent" name="parent">
';
            // 'top_categories' section
            $value = $context->find('top_categories');
            $buffer .= $this->section2c5e280b2f9e16ea6d9f805c254103d5($context, $indent, $value);
            $buffer .= $indent . '			</select>
';
            $buffer .= $indent . '		</div>
';
            $buffer .= $indent . '	</div>	
';
            $buffer .= $indent . '	<div class="form-group">
';
            $buffer .= $indent . '		<label for="tb-tags" class="col-sm-2 control-label">Tags</label>
';
            $buffer .= $indent . '		<div class="col-sm-10">
';
            $buffer .= $indent . '			<select multiple class="form-control make-chosen" id="tb-tags" name="tags[]">
';
            // 'admin_sub_categories' section
            $value = $context->find('admin_sub_categories');
            $buffer .= $this->sectionB6906b6bdde35c6891ca92c82f59762d($context, $indent, $value);
            $buffer .= $indent . '			</select>
';
            $buffer .= $indent . '		</div>
';
            $buffer .= $indent . '	</div>
';
        }
        $buffer .= $indent . '	
';
        // 'root_form' section
        $value = $context->find('root_form');
        $buffer .= $this->section936d4017a4f780dcc213efc6d91e0ab1($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<div class="form-group">
';
        $buffer .= $indent . '		<label for="tb-name" class="col-sm-2 control-label">Name</label>
';
        $buffer .= $indent . '		<div class="col-sm-10">
';
        $buffer .= $indent . '			<input type="text" class="form-control" id="tb-name" name="btxt" value="';
        $value = $this->resolveValue($context->find('btxt'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '" placeholder="Ex: My Menu Item">
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<div class="form-group">
';
        $buffer .= $indent . '		<label for="tb-href" class="col-sm-2 control-label">Link</label>
';
        $buffer .= $indent . '		<div class="col-sm-10">
';
        $buffer .= $indent . '			<input type="text" class="form-control" id="tb-href" name="href" value="';
        $value = $this->resolveValue($context->find('href'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '" placeholder="Ex: my-page.html">
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '		
';
        // 'root_form' inverted section
        $value = $context->find('root_form');
        if (empty($value)) {
            
            $buffer .= $indent . '		<div class="form-group">
';
            $buffer .= $indent . '			<label for="tb-rel"  class="col-sm-2 control-label">rel</label>
';
            $buffer .= $indent . '			<div class="col-sm-10">
';
            $buffer .= $indent . '				<input type="text" class="form-control" id="tb-rel" name="rel" value="';
            $value = $this->resolveValue($context->find('rel'), $context, $indent);
            $buffer .= htmlspecialchars($value, 2, 'UTF-8');
            $buffer .= '" placeholder="Ex: jonbox"/>
';
            $buffer .= $indent . '			</div>
';
            $buffer .= $indent . '		</div>
';
        }
        $buffer .= $indent . '	
';
        $buffer .= $indent . '	<div class="form-group">
';
        $buffer .= $indent . '		<label for="tb-rel"  class="col-sm-2 control-label">sort</label>
';
        $buffer .= $indent . '		<div class="col-sm-10" >
';
        $buffer .= $indent . '			<input type="text" class="form-control" id="tb-rel" name="sort" value="';
        $value = $this->resolveValue($context->find('sort'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '" placeholder="Ex: 500"/>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	
';
        // 'root_form' inverted section
        $value = $context->find('root_form');
        if (empty($value)) {
            
            $buffer .= $indent . '		<div class="form-group">
';
            $buffer .= $indent . '			<label for="tb-description" class="col-sm-2 control-label">Description</label>
';
            $buffer .= $indent . '			<div class="col-sm-10">
';
            $buffer .= $indent . '				<textarea class="form-control" id="tb-description" name="desc" placeholder="Ex: This page is only an example.">';
            $value = $this->resolveValue($context->find('desc'), $context, $indent);
            $buffer .= htmlspecialchars($value, 2, 'UTF-8');
            $buffer .= '</textarea>
';
            $buffer .= $indent . '			</div>
';
            $buffer .= $indent . '		</div>
';
            $buffer .= $indent . '		
';
            $buffer .= $indent . '		<hr>
';
            $buffer .= $indent . '		<div class="row">
';
            $buffer .= $indent . '			<div class="col-sm-2">
';
            $buffer .= $indent . '				<p class="text-right"><strong>Icon</strong></p>
';
            $buffer .= $indent . '			</div>
';
            $buffer .= $indent . '			<div class="col-sm-10">
';
            $buffer .= $indent . '				<p>"Glyph (Font Icon)" takes precedence over the standard "Image"</p>
';
            $buffer .= $indent . '			</div>
';
            $buffer .= $indent . '		</div>
';
            $buffer .= $indent . '		<div class="form-group">
';
            $buffer .= $indent . '			<label for="tb-glyph" class="col-sm-2 control-label">Glyph</label>
';
            $buffer .= $indent . '			<div class="col-sm-9">
';
            $buffer .= $indent . '				<select class="form-control make-chosen action" id="tb-glyph" name="glyph" data-action="top-bar-customize/preview-glyph">
';
            $buffer .= $indent . '					<option value="">None (Use Image)</option>
';
            // 'glyphs' section
            $value = $context->find('glyphs');
            $buffer .= $this->sectionC36d27eabf467ff0b4eb51b1b9c421bd($context, $indent, $value);
            $buffer .= $indent . '				</select>
';
            $buffer .= $indent . '			</div>
';
            $buffer .= $indent . '			<div class="col-sm-1" id="tbc-dc-glyph-previa"></div>
';
            $buffer .= $indent . '		</div>
';
            $buffer .= $indent . '		<div class="form-group">
';
            $buffer .= $indent . '			<label for="tb-imgsrc" class="col-sm-2 control-label">Image</label>
';
            $buffer .= $indent . '			<div class="col-sm-9">
';
            $buffer .= $indent . '				<input type="text" class="form-control action" id="tb-imgsrc" name="img" value="';
            $value = $this->resolveValue($context->find('img'), $context, $indent);
            $buffer .= htmlspecialchars($value, 2, 'UTF-8');
            $buffer .= '" placeholder="Ex: images/my-image.jpg" data-action="top-bar-customize/preview-imgsrc">
';
            $buffer .= $indent . '			</div>
';
            $buffer .= $indent . '			<div class="col-sm-1" id="tbc-dc-imgsrc-previa"></div>
';
            $buffer .= $indent . '		</div>
';
            $buffer .= $indent . '		<hr>
';
        }
        $buffer .= $indent . '	
';
        $buffer .= $indent . '	<div class="row">
';
        $buffer .= $indent . '		<div class="col-sm-2">
';
        $buffer .= $indent . '			<p class="text-right"><strong>Permissions</strong></p>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '		<div class="col-sm-10">
';
        $buffer .= $indent . '			<p>"Perm Key" (preferred) takes precedence over "Access Group"</p>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	<div class="form-group">
';
        $buffer .= $indent . '		<label for="tb-perm_key" class="col-sm-2 control-label">Perm Key</label>
';
        $buffer .= $indent . '		<div class="col-sm-10">
';
        $buffer .= $indent . '			<input type="text" class="form-control" id="tb-perm_key" name="perm_key" value="';
        $value = $this->resolveValue($context->find('perm_key'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '" placeholder="Ex: my_menu_item">
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	<div class="form-group">
';
        $buffer .= $indent . '		<label for="tb-access_group" class="col-sm-2 control-label">Access Group</label>
';
        $buffer .= $indent . '		<div class="col-sm-10">
';
        $buffer .= $indent . '			<input type="text" class="form-control" id="tb-access_group" name="access_group" value="';
        $value = $this->resolveValue($context->find('access_group'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '" placeholder="Ex: Admin Only (Only supports one)">
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	<div class="form-group">
';
        $buffer .= $indent . '		<div class="col-sm-8 col-sm-push-2">
';
        $buffer .= $indent . '			<button class="btn btn-primary" type="submit">
';
        $buffer .= $indent . '				<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
';
        $buffer .= $indent . '				Save
';
        $buffer .= $indent . '			</button>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '</form>
';

        return $buffer;
    }

    private function sectionDc79fa7059d47a98875cd8047fd3681d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
			<a href="top-bar-customize/enable" data-method="POST" data-id="{{ id }}" data-parent="{{ parent }}"  class="btn btn-danger action" aria-role="button" title="Click to enable this menu item">
				<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
				Disabled
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
                $buffer .= $indent . '			<a href="top-bar-customize/enable" data-method="POST" data-id="';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" data-parent="';
                $value = $this->resolveValue($context->find('parent'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"  class="btn btn-danger action" aria-role="button" title="Click to enable this menu item">
';
                $buffer .= $indent . '				<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
';
                $buffer .= $indent . '				Disabled
';
                $buffer .= $indent . '			</a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBe005e9990580aeaa1f09c8d3bff5a2b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '

		<p>
			{{^ display_disabled }}
			<a href="top-bar-customize/disable" data-method="POST" data-id="{{ id }}"  data-parent="{{ parent }}" class="btn btn-success action" aria-role="button" title="Click to disable this menu item">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				Enabled
			</a>
			{{/ display_disabled }}
			{{# display_disabled }}
			<a href="top-bar-customize/enable" data-method="POST" data-id="{{ id }}" data-parent="{{ parent }}"  class="btn btn-danger action" aria-role="button" title="Click to enable this menu item">
				<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
				Disabled
			</a>
			{{/ display_disabled }}
		</p>
		
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
                $buffer .= $indent . '
';
                $buffer .= $indent . '		<p>
';
                // 'display_disabled' inverted section
                $value = $context->find('display_disabled');
                if (empty($value)) {
                    
                    $buffer .= $indent . '			<a href="top-bar-customize/disable" data-method="POST" data-id="';
                    $value = $this->resolveValue($context->find('id'), $context, $indent);
                    $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                    $buffer .= '"  data-parent="';
                    $value = $this->resolveValue($context->find('parent'), $context, $indent);
                    $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                    $buffer .= '" class="btn btn-success action" aria-role="button" title="Click to disable this menu item">
';
                    $buffer .= $indent . '				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
';
                    $buffer .= $indent . '				Enabled
';
                    $buffer .= $indent . '			</a>
';
                }
                // 'display_disabled' section
                $value = $context->find('display_disabled');
                $buffer .= $this->sectionDc79fa7059d47a98875cd8047fd3681d($context, $indent, $value);
                $buffer .= $indent . '		</p>
';
                $buffer .= $indent . '		
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1b11611ceaa0c2d01994fb64dce81b89(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '{{^ is_system }}
		<a href="top-bar-customize/delete/{{ id }}" data-method="DELETE" class="btn btn-link action" aria-role="hidden" data-confirm="Are you sure you want to delete this menu item?">
			<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
			Delete
		</a>
		{{/ is_system }}';
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
                // 'is_system' inverted section
                $value = $context->find('is_system');
                if (empty($value)) {
                    
                    $buffer .= '
';
                    $buffer .= $indent . '		<a href="top-bar-customize/delete/';
                    $value = $this->resolveValue($context->find('id'), $context, $indent);
                    $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                    $buffer .= '" data-method="DELETE" class="btn btn-link action" aria-role="hidden" data-confirm="Are you sure you want to delete this menu item?">
';
                    $buffer .= $indent . '			<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
';
                    $buffer .= $indent . '			Delete
';
                    $buffer .= $indent . '		</a>
';
                    $buffer .= $indent . '		';
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6b1c7ca0713c67f3e40a167c2e7d75f7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '{{ . }}';
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
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBd6d241829fcbe59e01506b6f6c8d128(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = 'readonly';
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
                $buffer .= 'readonly';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9e2875c627d2dbad7c957250bbb623f7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = 'selected';
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
                $buffer .= 'selected';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2c5e280b2f9e16ea6d9f805c254103d5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<option value="{{ key }}" {{# selected }}selected{{/ selected }}>{{ name }}</option>
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
                $buffer .= $indent . '				<option value="';
                $value = $this->resolveValue($context->find('key'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" ';
                // 'selected' section
                $value = $context->find('selected');
                $buffer .= $this->section9e2875c627d2dbad7c957250bbb623f7($context, $indent, $value);
                $buffer .= '>';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</option>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB6906b6bdde35c6891ca92c82f59762d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<option value="{{ tag }}" {{# selected }}selected{{/ selected }}>{{ name }}</option>
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
                $buffer .= $indent . '				<option value="';
                $value = $this->resolveValue($context->find('tag'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" ';
                // 'selected' section
                $value = $context->find('selected');
                $buffer .= $this->section9e2875c627d2dbad7c957250bbb623f7($context, $indent, $value);
                $buffer .= '>';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</option>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section936d4017a4f780dcc213efc6d91e0ab1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
		<input type="hidden" name="parent" value="0" />
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
                $buffer .= $indent . '		<input type="hidden" name="parent" value="0" />
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC36d27eabf467ff0b4eb51b1b9c421bd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
						<option value="{{ name }}" {{# selected }}selected{{/ selected }}>{{ name }}</option>
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
                $buffer .= $indent . '						<option value="';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" ';
                // 'selected' section
                $value = $context->find('selected');
                $buffer .= $this->section9e2875c627d2dbad7c957250bbb623f7($context, $indent, $value);
                $buffer .= '>';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</option>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
