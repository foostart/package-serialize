/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){

    Sequence.init();

})

var Sequence = {
    init:function(){
        this.tracker()
    },
    tracker:function(){
        var self = this
        $('.sequence-input').change(function(){
            self.checkActiveButton();
        })

        $('#btnSaveSequence').click(function(){
            var formOb = $(this).closest('form');
            formOb.attr('action',urlUpdateSequence)
            formOb.attr('method','post');
            $(this).closest('form').submit();
        })
    },

    checkActiveButton:function(){
        var els = $('.sequence-input');

        var countChange = 0;

        $.each(els,function(){
            var original = $(this).attr('data-original')

            if(parseInt($(this).val()) != parseInt(original)){
                countChange++;
            }
        })

        if(countChange  > 0){
            $('#btnSaveSequence').show();
        }
        else{
            $('#btnSaveSequence').hide();
        }

    }
}