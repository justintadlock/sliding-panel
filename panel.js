var $j = jQuery.noConflict();
$j(document).ready(function () {
	$j('#sliding-panel .open').click(function () {
		$j('#sliding-panel .panel').slideDown('slow');
		$j('#sliding-panel .tab').addClass('current')
	});
	$j('#sliding-panel .close').click(function () {
		$j('#sliding-panel .panel').slideUp('slow');
		$j('#sliding-panel .tab').removeClass('current')
	});
	$j('#sliding-panel .toggle a').click(function () {
		$j('#sliding-panel .toggle a').toggle()
	})
});