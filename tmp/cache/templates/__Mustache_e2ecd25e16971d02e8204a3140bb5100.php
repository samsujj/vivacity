<?php

class __Mustache_e2ecd25e16971d02e8204a3140bb5100 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<div class="container">
';
        $buffer .= $indent . '	<h1>Top Bar <small>Custom Menu Items</small> <small id="cm-main-loader"></small></h1>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<div class="well">
';
        $buffer .= $indent . '		<p>Manage custom menu items that appear in the Top Bar menu.</p>
';
        $buffer .= $indent . '		<p><strong>Note to Developers:</strong> Add globally-available menu items via its respective module, either through hook_panel_menus_add() or through a versioning entry that modifies the database directly.</p>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<div class="row action-catch">
';
        $buffer .= $indent . '		<div class="col-sm-6 col-md-5">
';
        $buffer .= $indent . '			<p>
';
        $buffer .= $indent . '				<a href="top-bar-customize/add" class="btn btn-primary action" aria-role="button" title="Adds a new custom menu item">
';
        $buffer .= $indent . '					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
';
        $buffer .= $indent . '					Add
';
        $buffer .= $indent . '				</a>
';
        $buffer .= $indent . '				<a href="top-bar-customize/refresh" class="btn btn-default action" aria-role="button" title="Clears the cache and refreshes the page to test your changes.">
';
        $buffer .= $indent . '					<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
';
        $buffer .= $indent . '					Refresh
';
        $buffer .= $indent . '				</a>
';
        $buffer .= $indent . '			</p>
';
        $buffer .= $indent . '			<div id="tbc-dc-list"></div>
';
        $buffer .= $indent . '		</div>
';
        $buffer .= $indent . '		<div class="col-sm-6 col-md-7" id="tbc-dc-editor"></div>
';
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '</div>';

        return $buffer;
    }
}
