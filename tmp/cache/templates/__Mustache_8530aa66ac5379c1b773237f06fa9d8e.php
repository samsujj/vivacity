<?php

class __Mustache_8530aa66ac5379c1b773237f06fa9d8e extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<h1 class="h3">Permission Manager</h1>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<div class="action-catch">
';
        $buffer .= $indent . '	<form class="action form form-inline" action="permission_manager/search-type" method="get" data-loading-target="filter-loader">
';
        $buffer .= $indent . '		<p>
';
        $buffer .= $indent . '			<input class="form-control" type="text" required id="search-perm-type-keyword" name="keyword" value="" placeholder="Search Perm Type">
';
        $buffer .= $indent . '			<button type="submit" class="btn btn-primary">
';
        $buffer .= $indent . '				<span class="glyphicon glyphicon-filter"></span>
';
        $buffer .= $indent . '				Filter Classes
';
        $buffer .= $indent . '			</button>
';
        $buffer .= $indent . '			<a href="permission_manager/search_type" class="action btn btn-default" aria-role="button"  data-loading-target="filter-loader" data-callforward="reset_search">
';
        $buffer .= $indent . '				<span class="glyphicon glyphicon-refresh"></span>
';
        $buffer .= $indent . '				Show All
';
        $buffer .= $indent . '			</a>
';
        $buffer .= $indent . '			<span id="current-filter-output"></span>
';
        $buffer .= $indent . '			<span id="filter-loader" class="loading-target"></span>
';
        $buffer .= $indent . '		</p>
';
        $buffer .= $indent . '	</form>
';
        $buffer .= $indent . '	<form class="action" action="permission_manager/export" method="post">
';
        $buffer .= $indent . '		<ul id="perm-classes" class="list-group">
';
        if ($partial = $this->mustache->loadPartial('list')) {
            $buffer .= $partial->renderInternal($context, $indent . '			');
        }
        $buffer .= $indent . '		</ul>
';
        // 'can_export' section
        $value = $context->find('can_export');
        $buffer .= $this->sectionC04306d36ccba25e6b47a35f03986eec($context, $indent, $value);
        $buffer .= $indent . '	</form>
';
        $buffer .= $indent . '</div>
';
        // 'can_export' section
        $value = $context->find('can_export');
        $buffer .= $this->sectionBc301f1604f8357772a732d05048ae22($context, $indent, $value);

        return $buffer;
    }

    private function sectionC04306d36ccba25e6b47a35f03986eec(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
		<p>
			<button type="submit" class="btn btn-default">
				<span class="glyphicon glyphicon-arrow-up"></span>
				Export Selected Permission Classes
			</button>
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
                $buffer .= $indent . '		<p>
';
                $buffer .= $indent . '			<button type="submit" class="btn btn-default">
';
                $buffer .= $indent . '				<span class="glyphicon glyphicon-arrow-up"></span>
';
                $buffer .= $indent . '				Export Selected Permission Classes
';
                $buffer .= $indent . '			</button>
';
                $buffer .= $indent . '		</p>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBc301f1604f8357772a732d05048ae22(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
<a name="export"></a>
<div id="export-output">
	<textarea id="export-textarea" class="form-control" placeholder="Export Output Window" rows="10"></textarea>
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
                $buffer .= $indent . '<a name="export"></a>
';
                $buffer .= $indent . '<div id="export-output">
';
                $buffer .= $indent . '	<textarea id="export-textarea" class="form-control" placeholder="Export Output Window" rows="10"></textarea>
';
                $buffer .= $indent . '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
