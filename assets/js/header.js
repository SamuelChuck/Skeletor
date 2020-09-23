
/** 
 * @name    Show hide Header on scroll - skelehead video tutorial
 * @author   oooh-boi
*/

"use strict";
OB_ready(OB_doWhenReady);

function OB_doWhenReady() {
    // localize everything
    var skelehead = window.skelehead || {};
    // local scope variables
    skelehead.prev_scroll_pos = window.scrollY || document.body.scrollTop;
    skelehead.cur_scroll_pos;
    skelehead.scroll_direction = 'init';
    skelehead.prev_scroll_direction = 0;
    skelehead.header = document.querySelector('#y13GDHD'); // header ID
    skelehead.header_pos = {
        top: skelehead.header.offsetTop,
        left: skelehead.header.offsetLeft,
    };
    skelehead.header_height = OB_outerHeight(skelehead.header);
    // show-hide header with ease/transition
    skelehead.header.style.transition = 'all 0.3s ease';
    // update header height on window resize
    skelehead.updateHeaderHeight = function() {
        skelehead.header_height = OB_outerHeight(skelehead.header);
    }
    // listen "scroll" event and decide what to do
    skelehead.checkScroll = function() {
        skelehead.cur_scroll_pos = window.scrollY || document.body.scrollTop;

        if (skelehead.cur_scroll_pos > skelehead.prev_scroll_pos) skelehead.scroll_direction = 'down';
        else if (skelehead.cur_scroll_pos < skelehead.prev_scroll_pos) skelehead.scroll_direction = 'up';

        if (skelehead.scroll_direction !== skelehead.prev_scroll_direction) skelehead.toggleHeader(skelehead.scroll_direction, skelehead.cur_scroll_pos);
        skelehead.prev_scroll_pos = skelehead.cur_scroll_pos;
    }
    // add or remove class based on the scrolling direction
    skelehead.toggleHeader = function(scroll_direction, scroll_current) {
        if (scroll_direction === 'down' && scroll_current > skelehead.header_height) {
            OB_addClass(skelehead.header, 'im-hidden'); // for styling
            skelehead.header.style.top = -1 * skelehead.header_height + "px";
            skelehead.prev_scroll_direction = scroll_direction;
        } else if (scroll_direction === 'up') {
            OB_removeClass(skelehead.header, 'im-hidden');
            skelehead.header.style.top = skelehead.header_pos.top + "px";
            skelehead.prev_scroll_direction = scroll_direction;
        }
    }
    // listen "scroll" and "resize" window events
    window.addEventListener('scroll', skelehead.checkScroll);
    window.addEventListener('resize', skelehead.updateHeaderHeight);
}

function OB_outerHeight(el) {
    var height = el.offsetHeight;
    var style = getComputedStyle(el);
    height += parseInt(style.marginTop) + parseInt(style.marginBottom);
    return height;
}

function OB_addClass(el, className) {
    if (el.classList) el.classList.add(className);
    else {
        var current = el.className,
            found = false;
        var all = current.split(' ');
        for (var i = 0; i < all.length, !found; i++) found = all[i] === className;
        if (!found) {
            if (current === '') el.className = className;
            else el.className += ' ' + className;
        }
    }
}

function OB_removeClass(el, className) {
    if (el.classList) el.classList.remove(className);
    else el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
}

function OB_ready(fn) {
    if (document.readyState != 'loading') fn();
    else if (document.addEventListener) document.addEventListener('DOMContentLoaded', fn);
    else {
        document.attachEvent('onreadystatechange', function() {
            if (document.readyState != 'loading') fn();
        });
    }
}