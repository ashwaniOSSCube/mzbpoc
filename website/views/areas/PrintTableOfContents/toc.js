var TocGenerator = {


    createGeneralToc: function() {
        var toc = '';
        // iterate through the headings
        var tocText = "<ul>";
        $('.js-toc-mainchapter').each(function(index, element) {

            var chapterCssClass = $(element).attr('rel');
            var targetId = "generated-main-target" + chapterCssClass + "-" + index;

            $("<a id='" + targetId + "'></a>").insertBefore($(element));

            tocText += '<li class="' + $(element).attr('rel') + ' mainChapter">';
            tocText += '<div class="entry"><a href="#' + targetId + '">';
            tocText += $(element).html();
            tocText += '</a></div>';

            tocText += TocGenerator.generateGeneralTocSubheadlines(chapterCssClass);


            tocText += '</li>';

        });

        tocText += "</ul>";

        $('#generalToc').html(tocText);
    },

    generateGeneralTocSubheadlines: function(chapterCssClass) {
        var subTocText = "<ul>";

        $(".page." + chapterCssClass + " .js-toc-subchapter").each(function(index, element) {

            var targetId = "generated-sub-target" + chapterCssClass + "-" + index;

            $("<a id='" + targetId + "'></a>").insertBefore(element);

            subTocText += "<li>";
            subTocText += '<div class="subentry"><a href="#' + targetId + '">';
            subTocText += $(element).html();
            subTocText += '</a></div>';
            subTocText += "</li>";

        });

        subTocText += "</ul>";

        return subTocText;
    }
};


$(document).ready(function() {
    TocGenerator.createGeneralToc();
});