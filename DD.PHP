<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    $(document).ready(function(){3
        setInterval(function(){			
        allMessages();
               	
	    }, 2000);
    $(document).on('click', '.contact', function(){		
		$('.contact').removeClass('bg-white');
		$(this).addClass('bg-white');       
        
		var to_user_id = $(this).data('touserid');
        var name_user=$(this).data('nameuser')
		showUserChat(to_user_id); 
		$(".chatMessage").attr('placeholder', 'Escribir mensaje para '+name_user);
        $(".men").attr('value', to_user_id);
        
	    });
        setInterval(function(){			
        allMessagesGroup();               	
	    }, 3000);
        $(document).on('click','.groupcontact', function(){
            var groupData=$(this).data('togroupid');
            showGroupChat(groupData);
            $(".chatMessage").attr('placeholder', 'Envia un mensaje al grupo...');
            $(".men").attr('value', groupData);
            $(".chatButton").attr('onclick', 'saveMessageGroup()');
            $(".messages").attr('id', 'conversationGroup');
        });
        
        $(document).on('click', '.newgroup', function(){
            newgroup();
            countGroup();
        });
        $(document).on('click','#contactToggle', function(){
            $("#contacts").toggle(300);
        });
        $(document).on('click','#groupsToggle', function(){
            $("#groups").toggle(300);
        });
    });
    function newgroup(){
        $('.finishGroup').removeClass('hidden');
		$(this).addClass(''); 
        $(".inputGeneral").attr('placeholder', 'Escribir el asunto o nombre del grupo ...');
        $(".inputGeneral").attr('id', 'nameGroup');
        $('#groupm').html('<div>Seleccionar participantes</div>');
        var userFrom='{{Auth::user()->id}}';
        $.ajax({
            type:"GET",
            datatype:'json',
            url: '{{route('admin.chat.index')}}/contactos/'+userFrom,
            success: function(response){
                var data=""
                $.each(response, function(key, value){
                    data=data +"<div class=' bg-white px-3 flex items-center rounded shadow-lg  cursor-pointer' data-touserid='"+value.id+"' data-nameuser='"+value.name+"'>"+
                                        "<div>"+
                                            "<img class='h-12 w-12 rounded-full'"+
                                                 "src='https://www.biography.com/.image/t_share/MTE5NTU2MzE2MjE4MTY0NzQ3/harrison-ford-9298701-1-sized.jpg'/>"+
                                        "</div>"+
                                        "<div class='cap ml-4 flex-1 border-l-2 border-purple-600 bg-blue-100 bg-opacity-75 py-4 px-4'>"+
                                            "<p class='text-grey-dark mt-1 text-sm'>"+value.email+
                                            "</p>"+
                                        "</div>"+
                                        "<input type='checkbox' class='form-checkbox' value='"+value.id+"' name='members[]'>"+
                                    "</div>"+                                    
                                    "<br>"
                })
                $('#contacts').html(data);
                
            }
        })   
        
    }
    function countGroup(){
        $.ajax({
            method:"POST",
            datatype:"json",
            data:{habilitado:'1'},
            url:'{{route('admin.chat.contargrupos')}}',
            success:function(response){
                var data=""
                $.each(response, function(key, value){
                    $(".groupC").attr('value', value.conteo+1);
                })
            }
        });
    }
    function saveGroup(){
        var groupC=$('#groupC').val();
        var nameGroup= $('#nameGroup').val();        
        var selected = '';
        $(".inputGeneral").attr('placeholder', 'Buscar contactos para iniciar conversación ...');
        $(".inputGeneral").attr('id', 'shearch');  
        $('.finishGroup').attr('class','finishGroup flex justify-center bg-gray-100 hidden paul');
        $('.inputGeneral').val('');
        allData();   
        $('input[type=checkbox]').each(function(){
            if (this.checked) {
                selected = selected+' '+$(this).val();
            }
        });
        $.ajax({
            method:"POST",
            datatype:"json",
            data:{nameTeam:nameGroup,membersTeam:selected,habilitado:'1',idGroup:groupC},
            url:'{{route('admin.chat.savegroup')}}',
            success:function(response){
                console.log(response);                
            }
        });
    
    }
    function saveMessage(){
        var to_user = $('#to_user_idValue').val();
        var message_to= $('#chat_message_To').val();
        $('.chatMessage').val('');
        $.ajax({
            method:"POST",
            dataType: "json",
            data:{message:message_to,toUserMessage:to_user, state:'1',from_user:'{{Auth::user()->id}}'},
            url: '{{route('admin.chat.saveMessage')}}',
            success: function(response){ 
            }
        });
    }
    function saveMessageGroup(){
        var to_group = $('#to_user_idValue').val();
        var message_to= $('#chat_message_To').val();
        $('.chatMessage').val('');
        $.ajax({
            method:"POST",
            dataType: "json",
            data:{message:message_to,toGroupMessage:to_group, state:'1',from_user:'{{Auth::user()->id}}'},
            url: '{{route('admin.chat.saveMessageGroup')}}',
            success: function(response){ 
            }
        });
    }
    function allMessages(){
        var touser= $('#to_user_idValue').val();
        var fromuser= '{{Auth::user()->id}}';
        $.ajax({
            method:"GET",
            dataType: "json",
            url:'{{route('admin.chat.index')}}/showMessage/'+fromuser+'/'+touser,
            success: function(response){ 
                var data=""
                $.each(response, function(key, value){
                    var authuser='{{Auth::user()->id}}';
                    var from=value.sender_userid;
                    if(authuser==from){
                        data= data+"<div class='flex justify-end mb-2'>"+
                                            "<div class='rounded py-2 px-3' style='background-color: #E2F7CB'>"+
                                                "<p class='text-sm mt-1'>"+value.message+
                                                "</p>"+
                                                "<p class='text-right text-xs text-grey-dark mt-1'>"+
                                                    "12:45 pm"+
                                                "</p>"+
                                            "</div>"+
                                        "</div>"
                    }else{
                        data= data+"<div class='flex mb-2'>"+
                                            "<div class='rounded py-2 px-3' style='background-color: #F2F2F2'>"+
                                                "<p class='text-sm mt-1'>"+value.message+
                                                "</p>"+
                                                "<p class='text-right text-xs text-grey-dark mt-1'>"+
                                                  " 12:15 pm"+
                                                "</p>"+
                                            "</div>"+
                                        "</div> "
                    }
                    
                })
                $('#conversation').html(data); 
            }
        });
    }
    allMessages();
    function allMessagesGroup(){
        var touser= $('#to_user_idValue').val();
        var fromuser= '{{Auth::user()->id}}';
        $.ajax({
            method:"GET",
            dataType: "json",
            url:'{{route('admin.chat.index')}}/showMessageGroup/'+touser,
            success: function(response){ 
                var data=""
                $.each(response, function(key, value){
                    var authuser='{{Auth::user()->id}}';
                    var from=value.IdUserSender;
                    if(authuser==from){
                        data= data+"<div class='flex justify-end mb-2'>"+
                                            "<div class='rounded py-2 px-3' style='background-color: #E2F7CB'>"+
                                                "<p class='text-sm text-indigo-700'>"+value.name+                                            
                                                "</p>"+
                                                "<p class='text-sm mt-1'>"+value.messageGroup+
                                                "</p>"+
                                                "<p class='text-right text-xs text-grey-dark mt-1'>"+
                                                    "12:45 pm"+
                                                "</p>"+
                                            "</div>"+
                                        "</div>"
                    }else{
                        data= data+"<div class='flex mb-2'>"+
                                            "<div class='rounded py-2 px-3' style='background-color: #F2F2F2'>"+
                                                "<p class='text-sm text-green-600'>"+value.name+                                            
                                                "</p>"+
                                                "<p class='text-sm mt-1'>"+value.messageGroup+
                                                "</p>"+
                                                "<p class='text-right text-xs text-grey-dark mt-1'>"+
                                                  " 12:15 pm"+
                                                "</p>"+
                                            "</div>"+
                                        "</div> "
                    }
                    
                })
                $('#conversationGroup').html(data); 
            }
        });
    }
    allMessagesGroup();
    
    function showUserChat(to_user_id){        
    var id= to_user_id;
	$.ajax({        
		method:"GET",
        dataType: "json",		
        url:'{{route('admin.chat.index')}}/mostrarUsuarios/'+id,		
		success:function(response){            
            $('#userSection').html("<div class='flex items-center'>"+
                                        "<div>"+
                                           " <img class='w-10 h-10 rounded-full' src='https://darrenjameseeley.files.wordpress.com/2014/09/expendables3.jpeg'/>"+
                                        "</div>"+
                                        "<div class='ml-4'>"+
                                            "<p class='text-grey-darkest'>"+response.name+
                                            "</p>"+
                                            "<p class='text-grey-darker text-xs mt-1'>"+
                                                "Agregar información de última sesión"+
                                            "</p>"+
                                        "</div>"+
                                    "</div>"+
                                    "<div class='flex'>"+                                        
                                        "<div class='ml-6'>"+
                                            "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='#263238' fill-opacity='.6' d='M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z'></path></svg>"+
                                        "</div>"+
                                    "</div>");
			
		}
	});
    } 
    showUserChat();
    function showGroupChat(groupData){            
    var id= groupData;
	$.ajax({        
		method:"GET",
        dataType: "json",		
        url:'{{route('admin.chat.index')}}/mostrarGrupo/'+id,		
		success:function(response){            
            $('#userSection').html("<div class='flex items-center'>"+
                                        "<div>"+
                                           " <img class='w-10 h-10 rounded-full' src='https://darrenjameseeley.files.wordpress.com/2014/09/expendables3.jpeg'/>"+
                                        "</div>"+
                                        "<div class='ml-4'>"+
                                            "<p class='text-grey-darkest'>"+response.groupName+
                                            "</p>"+
                                            "<p class='text-grey-darker text-xs mt-1'>"+
                                                "Agregar información de última sesión"+
                                            "</p>"+
                                        "</div>"+
                                    "</div>"+
                                    "<div class='flex'>"+                                        
                                        "<div class='ml-6'>"+
                                            "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='#263238' fill-opacity='.6' d='M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z'></path></svg>"+
                                        "</div>"+
                                    "</div>");
			
		}
	});
    } 
    showGroupChat();
    function allGroups(){
        var userFrom='{{Auth::user()->id}}';
        $.ajax({
            type:"GET",
            datatype:'json',
            url: '{{route('admin.chat.index')}}/showGroups/'+userFrom,
            success: function(response){
                var data=""
                $.each(response, function(key, value){
                    data=data +"<div class='groupcontact bg-white px-3 flex items-center rounded shadow-lg  cursor-pointer' data-toGroupId='"+value.IdGroup+"'>"+
                                        "<div>"+
                                            "<img class='h-12 w-12 rounded-full'"+
                                                 "src='https://www.biography.com/.image/t_share/MTE5NTU2MzE2MjE4MTY0NzQ3/harrison-ford-9298701-1-sized.jpg'/>"+
                                        "</div>"+
                                        "<div class='cap ml-4 flex-1 border-l-2 border-purple-600 bg-blue-100 bg-opacity-75 py-4 px-4'>"+
                                            "<div class='flex items-bottom justify-between'>"+
                                                "<p class='text-grey-darkest'>"+value.groupName+" <small style='color:green;'>Online</small>"+                                                    
                                                "</p>"+
                                                "<p class='text-xs text-grey-darkest'>"+
                                                "</p>"+
                                            "</div>"+
                                            "<p class='text-grey-dark mt-1 text-sm'>"+value.groupName+
                                            "</p>"+
                                        "</div>"+
                                    "</div>"+                                    
                                    "<br>"
                })
                $('#groups').html(data);
                
            }
        })
    }
    allGroups();
    function allData(){
        var userFrom='{{Auth::user()->id}}';
        $.ajax({
            type:"GET",
            datatype:'json',
            url: '{{route('admin.chat.index')}}/contactos/'+userFrom,
            success: function(response){
                var data=""
                $.each(response, function(key, value){
                    data=data +"<div class='contact bg-white px-3 flex items-center rounded shadow-lg  cursor-pointer' data-touserid='"+value.id+"' data-nameuser='"+value.name+"'>"+
                                        "<div>"+
                                            "<img class='h-12 w-12 rounded-full'"+
                                                 "src='https://www.biography.com/.image/t_share/MTE5NTU2MzE2MjE4MTY0NzQ3/harrison-ford-9298701-1-sized.jpg'/>"+
                                        "</div>"+
                                        "<div class='cap ml-4 flex-1 border-l-2 border-purple-600 bg-blue-100 bg-opacity-75 py-4 px-4'>"+
                                            "<div class='flex items-bottom justify-between'>"+
                                                "<p class='text-grey-darkest'>"+value.name+" <small style='color:green;'>Online</small>"+                                                    
                                                "</p>"+
                                                "<p class='text-xs text-grey-darkest'>"+
                                                "</p>"+
                                            "</div>"+
                                            "<p class='text-grey-dark mt-1 text-sm'>"+value.email+
                                            "</p>"+
                                        "</div>"+
                                    "</div>"+                                    
                                    "<br>"
                })
                $('#contacts').html(data);
                
            }
        })
    }
    allData();
</script>
