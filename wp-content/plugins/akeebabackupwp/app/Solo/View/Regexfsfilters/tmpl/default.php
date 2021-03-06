<?php
/**
 * @package        solo
 * @copyright      2014 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license        GNU GPL version 3 or later
 */

use Awf\Text\Text;
use Solo\Helper\Escape;

/** @var \Solo\View\Regexfsfilters\Html $this */

$router = $this->container->router;

?>
<div class="modal fade" id="dialog" tabindex="-1" role="dialog" aria-labelledby="dialogLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="dialogLabel">
				</h4>
			</div>
			<div class="modal-body" id="dialogBody">
			</div>
		</div>
	</div>
</div>


<div class="alert alert-info">
	<strong><?php echo Text::_('CPANEL_PROFILE_TITLE'); ?></strong>
	#<?php echo $this->profileid; ?> <?php echo $this->profilename; ?>
</div>

<div class="form-inline well">
	<div>
		<label><?php echo Text::_('FSFILTER_LABEL_ROOTDIR') ?></label>
		<span><?php echo $this->root_select; ?></span>
	</div>
</div>

<div id="ak_list_container">
	<table id="table-container" class="table table-striped">
		<thead>
		<tr>
			<td width="48px">&nbsp;</td>
			<td width="250px"><?php echo Text::_('FILTERS_LABEL_TYPE') ?></td>
			<td><?php echo Text::_('FILTERS_LABEL_FILTERITEM') ?></td>
		</tr>
		</thead>
		<tbody id="ak_list_contents" class="table-container">
		</tbody>
	</table>
</div>

<script type="text/javascript">
Solo.loadScripts[Solo.loadScripts.length] = function () {
	(function($){
		Solo.System.params.AjaxURL = '<?php echo Escape::escapeJS($router->route('index.php?view=regexfsfilters&task=ajax&format=raw')) ?>';

		/**
		 * AJAX error callback
		 *
		 * @param   msg  The error message to show
		 */
		Solo.System.params.errorCallback = function(msg)
		{
			$('#dialogLabel').html('<?php echo Escape::escapeJS(Text::_('CONFIG_UI_AJAXERRORDLG_TITLE')) ?>');
			$('#dialogBody').html('');
			var alertBox = $(document.createElement('div')).addClass('alert alert-danger');
			alertBox.html('<?php echo Escape::escapeJS(Text::_('CONFIG_UI_AJAXERRORDLG_TEXT')) ?><br><pre>' + msg + '</pre>');
			alertBox.appendTo($('#dialogBody'));
			$('#dialog').modal({backdrop: 'static', keyboard: false});
		}

		// Push translations
		Solo.Regexfsfilters.translations['UI-ROOT'] = '<?php echo Escape::escapeJS(Text::_('FILTERS_LABEL_UIROOT')) ?>';
		Solo.Regexfsfilters.translations['UI-ERROR-FILTER'] = '<?php echo Escape::escapeJS(Text::_('FILTERS_LABEL_UIERRORFILTER')) ?>';
		Solo.Fsfilters.translations['UI-ROOT'] = '<?php echo Escape::escapeJS(Text::_('FILTERS_LABEL_UIROOT')) ?>';
		Solo.Fsfilters.translations['UI-ERROR-FILTER'] = '<?php echo Escape::escapeJS(Text::_('FILTERS_LABEL_UIERRORFILTER')) ?>';
		<?php
			$filters = array('directories', 'skipfiles', 'skipdirs', 'files');
			foreach($filters as $type)
			{
				echo "\tSolo.Regexfsfilters.translations['UI-FILTERTYPE-REGEX" . strtoupper($type)."'] = '".
					Escape::escapeJS(Text::_('FSFILTER_TYPE_' . $type)) . "';\n";
			}
		?>

		// Bootstrap the page display
		var data = eval(<?php echo Escape::escapeJS($this->json,"'"); ?>);

		Solo.Regexfsfilters.render(data);
	}(akeeba.jQuery));
};
</script>