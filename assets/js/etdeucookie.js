var etdeucookie = window.etdeucookie = {

    $content: null,
    container: '',

    init: function(content, container) {

        this.$content = content;
        this.container = container.toString();

        this.bind();
    },

    bind: function () {

        var self = this;

        $('body').append(this.$content);
        $('#etd-cookie-b button').on('click', function(e) {
            e.preventDefault();
            var t = new Date();
            t.setMilliseconds(t.getMilliseconds() + 30 * 864e+5);
            document.cookie = 'etdeucookie=ok; expires=' + t.toUTCString();
            $('#' + self.container).remove();
        });
    }
};