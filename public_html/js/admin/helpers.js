Handlebars.registerHelper('eachkeys', function(context, options) {
    var fn = options.fn, inverse = options.inverse;
    var ret = "";

    var empty = true;
    for (key in context) { empty = false; break; }

    if (!empty) {
        for (key in context) {
            ret = ret + fn({ 'key': key, 'value': context[key]});
        }
    } else {
        ret = inverse(this);
    }
    return ret;
});
