document.addEventListener("DOMContentLoaded", function () {
    $(".select2").select2();
});

function cascadeSelect(event) {
    const firstSelect = $(`#${event.target.id}`);

    const cascadeSelect = $(`#${firstSelect.data("cascade-element")}`);
    const cascadeURL = firstSelect.data("cascade-url");

    cascadeSelect.prop("disabled", false);
    cascadeSelect.val(null).trigger("change");

    cascadeSelect.select2({
        placeholder: trans.general.select,
        ajax: {
            url: cascadeURL,
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    id: firstSelect.val(),
                    search: params.term,
                };
            },
            processResults: function (data) {
                if (data.length === 0) {
                    cascadeSelect.prop("disabled", true);
                    cascadeSelect.val(null).trigger("change");
                    cascadeSelect.select2("close");
                }

                return {
                    results: data,
                };
            },
        },
    });

    cascadeSelect.select2("open");
}
