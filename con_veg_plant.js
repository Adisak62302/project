$(function () {
    // ประกาศตัวแปร
    var veg_typeObject = $('#veg_type');
    var vegObject = $('#veg');
    var dayObject = $('#day');

    // on change vegtype
    veg_typeObject.on('change', function () {

        // ประกาศตัวแปรมาเก็บ value ของ ประเภทผัก
        var veg_type_Id = $(this).val();

        // ทำให้ช่องเลือกผักว่าง เพื่อเตรียมใส่ข้อมูล
        vegObject.html('<option value="" selected disabled require>เลือก</option>');

        // $.get รอรับข้อมูล ส่วน get ในวงเล็บคือส่งข้อมูลไอดีประเภทไปเช็คเอาข้อมูลผักมา
        $.get('get_veg.php?veg_type_Id=' + veg_type_Id, function (data) {

            // แปลงstringเป็นobject
            var result = JSON.parse(data);

            // ลูปforeach ส่งข้อมูลผักไปในช่อง select ผัก
            $.each(result, function (index, item) {
                vegObject.append(
                    $('<option></option>').val(item.id_Vegetable).html(item.Name)
                );
            });

        });
    });

    vegObject.on('change', function () {

        // ประกาศตัวแปรมาเก็บ value ของ ประเภทผัก
        var id_Vegetable = $(this).val();

        dayObject.empty();
        
        // $.get รอรับข้อมูล ส่วน get ในวงเล็บคือส่งข้อมูลไอดีประเภทไปเช็คเอาข้อมูลผักมา
        $.get('get_day.php?id_Vegetable=' + id_Vegetable, function (data) {

            // แปลงข้อความเป็นobject
            var result = JSON.parse(data);

            $.each(result, function (index, item) {
                dayObject.append(
                     $('<input name="soilday" id="soilday" hidden ></input>').val(item.soil).html(item.soil),
                    $('<input name="fertilizeday" id="fertilizeday" hidden></input>').val(item.Fertilize).html(item.Fertilize)
                );
            });

        });
    });
});