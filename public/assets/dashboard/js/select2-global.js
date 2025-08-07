document.addEventListener("DOMContentLoaded", function () {
    $(".select2").select2();
});

function cascadeSelect(event) {
    const firstSelect = $(this);

    const cascadeSelect = $(`#${firstSelect.data("cascade-elements")}`);
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
                return {
                    results: data,
                };
            },
        },
    });
}
