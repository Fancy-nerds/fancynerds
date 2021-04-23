jQuery(function($) {
    $(document).on('click', '.toggle', function(e) {
        let $current = $(this);
        let $activeClass = 'toggle__text--active';
        $current.siblings('.toggle__text').removeClass($activeClass);

        // checked = 'after'
        if ($current.find('input').prop('checked')) {
            $current.siblings('.toggle__text--after').addClass($activeClass);
        }
        else {
            $current.siblings('.toggle__text--before').addClass($activeClass);
        }
        
        let $numbers = $(document).find('.numbers__count');
        if ($numbers) {
            $.each($numbers, function() {
                let $before = $(this).data('before');
                let $after = $(this).data('after');

                // checked = 'after'
                if ($current.find('input').prop('checked')) {
                    $(this).text($after);
                }
                else {
                    $(this).text($before);
                }
            });
        }
    })
})

jQuery(function($) {
    /*
    jQuery animateNumber plugin v0.0.14
    (c) 2013, Alexandr Borisov.
    https://github.com/aishek/jquery-animateNumber
    */
    (function(d){var r=function(b){return b.split("").reverse().join("")},m={numberStep:function(b,a){var e=Math.floor(b);d(a.elem).text(e)}},g=function(b){var a=b.elem;a.nodeType&&a.parentNode&&(a=a._animateNumberSetter,a||(a=m.numberStep),a(b.now,b))};d.Tween&&d.Tween.propHooks?d.Tween.propHooks.number={set:g}:d.fx.step.number=g;d.animateNumber={numberStepFactories:{append:function(b){return function(a,e){var f=Math.floor(a);d(e.elem).prop("number",a).text(f+b)}},separator:function(b,a,e){b=b||" ";
    a=a||3;e=e||"";return function(f,k){var u=0>f,c=Math.floor((u?-1:1)*f).toString(),n=d(k.elem);if(c.length>a){for(var h=c,l=a,m=h.split("").reverse(),c=[],p,s,q,t=0,g=Math.ceil(h.length/l);t<g;t++){p="";for(q=0;q<l;q++){s=t*l+q;if(s===h.length)break;p+=m[s]}c.push(p)}h=c.length-1;l=r(c[h]);c[h]=r(parseInt(l,10).toString());c=c.join(b);c=r(c)}n.prop("number",f).text((u?"-":"")+c+e)}}}};d.fn.animateNumber=function(){for(var b=arguments[0],a=d.extend({},m,b),e=d(this),f=[a],k=1,g=arguments.length;k<g;k++)f.push(arguments[k]);
    if(b.numberStep){var c=this.each(function(){this._animateNumberSetter=b.numberStep}),n=a.complete;a.complete=function(){c.each(function(){delete this._animateNumberSetter});n&&n.apply(this,arguments)}}return e.animate.apply(e,f)}})(jQuery);

    $(document).on('scroll', function() {

        if ($('.counters').length > 0) {
            var heightWindow = $(window).innerHeight();
            var offsetNumbers = $('.counters').offset().top;
            var scrollTop = $(document).scrollTop();

            if (scrollTop > (offsetNumbers - heightWindow + 100)) {
                $('[data-counter]').each(function(indx){
                    var count = $(this).attr('data-counter');
                    var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(' ');

                    if ($(this).html() == 0 || $(this).html() == '0') {
                        $(this).animateNumber({ 
                            number: count,
                            numberStep: comma_separator_number_step
                        }, 2000);
                    }
                });
            }
        }
    })
})