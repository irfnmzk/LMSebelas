$( document ).ready(function() {
           $('.quiz-control').click(function (e) {
			    e.preventDefault();
                var link = $(this).val();
                var url = "{{ url('quiz_control/') }}"+"/"+link+"";
                console.log(url);
                $('.reader-bg', window.parent.document).html("<iframe id='if_quiz_control' style='width:100%;height:85vh;position:relative;' height='100%' width='100%' src='"+url+"' frameborder='0'></iframe>");
			});

           $('.quiz-result-all').click(function (e) {
                e.preventDefault();
                var link = $(this).val();
                var url = "{{ url('quiz_result_all/') }}"+"/"+link+"";
                console.log(url);
                $('.reader-bg', window.parent.document).html("<iframe id='if_quiz_res_all' style='width:100%;height:85vh;position:relative;' height='100%' width='100%' src='"+url+"' frameborder='0'></iframe>");
            });

			$('#blah').hide();

	        function readURL(input) {
	            if (input.files && input.files[0]) {
	                var reader = new FileReader();

	                reader.onload = function (e) {
	                    $('#blah').attr('src', e.target.result);
	                }

	                reader.readAsDataURL(input.files[0]);
	            }
	        }

            function iframe_reload(){
                document.location.href = document.location.href;
            }

            $('.iframe-reload').click(function () {
                iframe_reload();
                console.log("Cek");
            });

	        $('#picture').change(function () {
			  	$('#blah').show();
	            console.log("cek");
	            readURL(this);
			});

			$('#example').DataTable({
            "pagingType": "full_numbers",
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });

	        $('.summernote').summernote({
	            height: 100,
	            tabsize: 2,
	            placeholder: 'Pertanyaan'
			});

			$(document).on('submit', '.form_soal', function (e) {
		        e.preventDefault();
		        
		        var formdata = new FormData(this);
		        
		        $.ajax({
		            type: 'POST',
		            url: $(this).attr('action'),
		            data: formdata,
		            cache:false,
		            contentType: false,
		            processData: false,
		            success: function(data){
		                $('#TambahSoal').modal('toggle');
		                document.location.href = document.location.href;
		            },
		            error: function(data){
		                alert('error');
		            }
		        });
		    });

		    //cookie area

		    function createCookie(name,value,days) {
                  if (days) {
                    var date = new Date();
                    date.setTime(date.getTime()+(days*24*60*60*1000));
                    var expires = "; expires="+date.toGMTString();
                  }
                  else var expires = "";
                  document.cookie = name+"="+value+expires+"; path=/";
                }

            function readCookie(name) {
              var nameEQ = name + "=";
              var ca = document.cookie.split(';');
              for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
              }
              return null;
            }

            function eraseCookie(name) {
              createCookie(name,"",-1);
            }

            // Quiz Attempt Area
            var id_user = eval($('meta[name="id_user"]').attr('content'));
            var id_quiz = $('meta[name="id_quiz"]').attr('content');
            var token = $('meta[name="csrf_token"]').attr('content');

            function stopquiz() {
                eraseCookie('seconds'+id_user+id_quiz);
                eraseCookie('choosesoal'+id_user+id_quiz);
                var idd = $('input').attr("idanswer");

                    $.ajax({
                        method:"POST",
                        url:'{{ url('/stopquiz') }}',
                        data:{id_quiz: id_quiz, idd: idd},
                        success:function(result){
                            iframe_reload();
                        }
                    });
            }


            var total_seconds = readCookie('seconds'+id_user+id_quiz) || {{ $quiz->durasi * 60}};
            

            function startTimer(duration,display)
            {
                var timer = duration,minutes,seconds;
                setInterval(function(){
                minutes = parseInt(timer/60,10);
                seconds = parseInt(timer%60,10);
                display.text(minutes+":"+seconds);
                createCookie('seconds'+id_user+id_quiz ,timer, 1);
                if(--timer<0){
                    stopquiz();
                }
                },1000);
            }

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });

            $("input[type=radio],button.berikutnya").click(function(){

            var id_answer = $(this).attr("idanswer");
            var id_question = $(this).attr("idquestion");
            var answer = $(this).val();
            var thisElement = $(this);
            var ke = $(this).attr("ke");
            var id = $("a[nomorsoal="+ke+"]").attr("idid");
            var elem = $(this);
            if($(this).attr("type")=="button")
            {
                answers = new Array();
                $("[name='jawabansoal["+ke+"][]']").each(function(){
                    answers.push($(this).val());
                });
                answer = answers.join();
            }
            if($("[name='jawabansoal["+ke+"]']").attr("type")=="radio"){
                answer=$("[name='jawabansoal["+ke+"]']:checked").val();
            }

            $.ajax({
                method:"POST",
                url:'{{ url('/saveanswerquiz') }}',
                data:{id_answer : id_answer,id_question:id_question,answer:answer},
                success:function(result){
                    if(result.status=="success")
                    {
                        $("a[nomorsoal="+ke+"]").removeClass("btn-danger");
                        $("a[nomorsoal="+ke+"]").addClass("btn-success");
                        $("a[nomorsoal="+ke+"]").attr("idid",result.id);
                        //return false;
                        //location.reload();
                    }else
                    if(result.status=="no_insert"){
                    	$("a[nomorsoal="+ke+"]").addClass("btn-danger");
                    }
                    else{
                    	alert(result.message);
                        //return false;
                        //location.reload();
                    }
                    
                }
            });
        });
            $(".berikutnya").click(function(){
                    $(".listsoal a").removeClass("active");
                    if(!$(".listsoal a[nomorsoal="+eval(current)+"]").hasClass("btn-success")){
                        $(".listsoal a[nomorsoal="+eval(current)+"]").addClass("btn-danger");
                    }
                    $(".listsoal a[nomorsoal="+(eval(current)+1)+"]").addClass("active");
                    $(".soal-"+current).slideToggle('fast');
                    current = eval(current)+1;
                    $(".soal-"+current).slideToggle('fast');
                    
            });

            $(".sebelumnya").click(function(){
                    $(".listsoal a").removeClass("active");
                    if(!$(".listsoal a[nomorsoal="+eval(current)+"]").hasClass("btn-success")){
                        $(".listsoal a[nomorsoal="+eval(current)+"]").addClass("btn-danger");
                    }
                    $(".listsoal a[nomorsoal="+(eval(current)-1)+"]").addClass("active");
                    $(".soal-"+current).slideToggle('fast');
                    current = eval(current)-1;
                    $(".soal-"+current).slideToggle('fast');
                    
            });

            $(".listsoal a").click(function(){
                    $(".listsoal a").removeClass("active");
                    if(!$(".listsoal a[nomorsoal="+eval(current)+"]").hasClass("btn-success")){
                        $(".listsoal a[nomorsoal="+eval(current)+"]").addClass("btn-danger");
                    }
                    $(this).addClass("active");
                    $(".soal-"+current).slideToggle('fast');
                    current = $(this).attr("nomorsoal");
                    $(".soal-"+current).slideToggle('fast');
            });

            $(".finishquiz").click(function(){
            if(confirm("Apakah anda yakin akan keluar dari kuis ini ?"))
                {
                    stopquiz();
                }
            });
            $(".startquiz").click(function(){
                $.ajax({
                    method:"POST",
                    url:'{{ url('/checkquiz') }}',
                    data:{id_quiz: id_quiz},
                    success:function(result){
                        startTimer(total_seconds,$(".countdown"));
                        createCookie('choosesoal'+id_user+id_quiz ,true, 1);
                        $("input").attr("idanswer",result.id);
                        $("button.berikutnya").attr("idanswer",result.id);
                        for(var x=0;x<result.detail.length;x++)
                        {
                            if(result.detail[x].answer)
                            {
                                $("[idquestion='"+result.detail[x].id_question+"'][value='"+result.detail[x].answer+"']").attr("checked","true");
                            }
                            $("a[idsoal="+(result.detail[x].id_question)+"]").addClass("btn-success");
                        }
                        current = 1;
                        $(".soal-1").slideToggle('fast');
                        $(".startbutton").hide("fast");
                        $(".area-nomor-soal").slideToggle("fast");
                    }
                });
            });
            console.log(total_seconds);
            console.log(readCookie('choosesoal'+id_user+id_quiz));
            if(readCookie('choosesoal'+id_user+id_quiz)){
                $('.startquiz').click();
            }

			

    });