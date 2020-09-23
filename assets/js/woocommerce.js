/**
 * Skeletor Woocommerce Js Room.
 * This is all Theme woocommerce Js Functions run.
 *
 * @package flatsome
 */

/**
 * Quntity Selector
 */
//jQuery(function(t){String.prototype.getDecimals||(String.prototype.getDecimals=function(){var t=(""+this).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);return t?Math.max(0,(t[1]?t[1].length:0)-(t[2]?+t[2]:0)):0}),t(document.body).on("click",".plus, .minus",function(){var a=t(this).closest(".quantity").find(".qty"),e=parseFloat(a.val()),i=parseFloat(a.attr("max")),l=parseFloat(a.attr("min")),o=a.attr("step");e&&""!==e&&"NaN"!==e||(e=0),""!==i&&"NaN"!==i||(i=""),""!==l&&"NaN"!==l||(l=0),"any"!==o&&""!==o&&void 0!==o&&"NaN"!==parseFloat(o)||(o=1),t(this).is(".plus")?i&&e>=i?a.val(i):a.val((e+parseFloat(o)).toFixed(o.getDecimals())):l&&e<=l?a.val(l):e>0&&a.val((e-parseFloat(o)).toFixed(o.getDecimals())),a.trigger("change")})});


/**
 * Ajax Add to Cart
*/
var timeout;jQuery(function(t){t(".woocommerce").on("change","input.qty",function(){void 0!==timeout&&clearTimeout(timeout),timeout=setTimeout(function(){t("[name='update_cart']").trigger("click")},1e3)})});


/**
 * Notice
*/