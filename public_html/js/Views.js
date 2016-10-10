var CartSumView = Backbone.View.extend({

    el: '#cart-mini',
    template: $('#cart-mini-tmp').html(),

    events: {
        "click #cart-clear": "cartReset"
    },

    cartReset: function(){
        cartProducts.reset([]);
    },

    initialize: function() {
        this.listenTo(this.model, "change", this.render);
    },

    render: function() {
        var rendered = Mustache.render(this.template, {
            sum: this.model.get('sum')
        });
        this.$el.html( rendered );
        return this;
    }

});


var CartTableView = Backbone.View.extend({

    el: '#cart',

    template: $('#cart-table-tmp').html(),

    initialize: function() {
        this.listenTo(this.collection, "all", this.render);
    },

    render: function() {
        var rendered = Mustache.render(this.template, {
            products: this.collection.exportToView()
        });
        this.$el.html( rendered );
        return this;
    }

});





var CartCustomerView = Backbone.View.extend({

    el: '#cart',

    events: {
        "change input[type='text']": "changeInput",
        "focusout": "test"
    },

    test: function(e){
        var name = $(e.currentTarget).attr('name');
        switch (name) {
            case 'region':

                break;
            case 'city':

                break;
            case 'street':

                break;

        }
    },

    changeInput: function(e){
        var name = $(e.currentTarget).attr('name');
        var value = $(e.currentTarget).val();
        switch (name) {
            case 'name':
                cartCustomer.set({name: value});
                break;
            case 'surname':
                cartCustomer.set({surname: value});
                break;
            case 'telephone':
                cartCustomer.set({telephone: value});
                break;
            case 'email':
                cartCustomer.set({email: value});
                break;
            case 'region':
                alert('!');
                break;
            case 'apartment':
                this.selectApartment(value);
                break;
        }
    },

    selectRegion: function(region){
        cartCustomer.set({
            region: region,
            city: '',
            street: '',
            building: '',
            apartment:''
        });
    },

    selectCity: function(city){
        cartCustomer.set({
            city: city,
            street: '',
            building: '',
            apartment:''
        });
    },

    selectStreet: function(street){
        cartCustomer.set({
            street: street,
            building: '',
            apartment:''
        });
    },

    selectBuilding: function(building){
        cartCustomer.set({
            building: building,
            apartment:''
        });
    },

    selectApartment: function(apartment){
        cartCustomer.set({
            apartment: apartment
        });
    },

    template: $('#cart-customer-tmp').html(),

    initialize: function() {
        this.listenTo(this.model, "change", this.render);
    },

    render: function() {
        var rendered = Mustache.render(this.template, {
            region: cartCustomer.get('region'),
            city: cartCustomer.get('city'),
            street: cartCustomer.get('street'),
            building: cartCustomer.get('building'),
            apartment: cartCustomer.get('apartment'),
            name: cartCustomer.get('name'),
            surname: cartCustomer.get('surname'),
            email: cartCustomer.get('email'),
            telephone: cartCustomer.get('telephone'),
            next: cartCustomer.get('next'),
        });
        this.$el.html( rendered );


        this.initRegion();
        this.initCity();
        this.initStreet();
        this.initBuilding();


        return this;
    },

    initRegion: function(){
        var el = this.$el.find('input[name="region"]');
        var self = this;
        el.kladr({
            limit: 4,
            type: $.kladr.type.region,
            verify: true,
            select: function(obj){
                self.selectRegion(obj);
            },
            check:  function( obj ){
                if(!obj) {
                    console.error('initRegion error');
                    el.val('');
                    cartCustomer.set({
                        region: '',
                        city: '',
                        street: '',
                        building: '',
                        apartment: ''
                    });
                }
            }
        });
    },

    initCity: function(){
        if ( cartCustomer.get('region') === undefined ) return;
        var el = this.$el.find('input[name="city"]');
        var self = this;
        el.kladr({
            limit: 4,
            type: $.kladr.type.city,
            parentType: $.kladr.type.region,
            parentId: cartCustomer.get('region').id,
            verify: true,
            select: function(obj){
                self.selectCity(obj);
            },
            check:  function( obj ){
                if(!obj) {
                    console.error('initCity error');
                    el.val('');
                    cartCustomer.set({
                        city: '',
                        street: '',
                        building: '',
                        apartment: ''
                    });
                }
            }
        });
    },

    initStreet: function(){
        if ( cartCustomer.get('city') === undefined ) return;
        var el = this.$el.find('input[name="street"]');
        var self = this;
        el.kladr({
            limit: 4,
            parentType: $.kladr.type.city,
            type: $.kladr.type.street,
            parentId: cartCustomer.get('city').id,
            verify: true,
            select: function(obj){
                self.selectStreet(obj);
            },
            check:  function( obj ){
                if(!obj) {
                    console.error('initStreet error');
                    el.val('');
                    cartCustomer.set({
                        street: '',
                        building: '',
                        apartment: ''
                    });
                }
            },
            labelFormat: function (obj, query){
                console.log(obj);
                return obj.typeShort + '. ' +obj.name
            }
        });
    },


    initBuilding: function () {
        if ( cartCustomer.get('street') === undefined ) return;
        var el = this.$el.find('input[name="building"]');
        var self = this;
        el.kladr({
            limit: 4,
            parentType: $.kladr.type.street,
            type: $.kladr.type.building,
            parentId: cartCustomer.get('street').id,
            verify: true,
            select: function(obj){
                self.selectBuilding(obj);
            },
            check:  function( obj ){
                if(!obj) {
                    console.error('initBuilding error');
                    el.val('');
                    cartCustomer.set({
                        building: '',
                        apartment: ''
                    });
                }
            },
            labelFormat: function (obj, query){
                console.log(obj);
                return obj.typeShort + '. ' +obj.name
            }
        });
    },






});







var CartCheckView = Backbone.View.extend({

    el: '#cart',

    template: $('#cart-check-tmp').html(),

    initialize: function() {

    },

    render: function() {
        var rendered = Mustache.render(this.template, {
            customer: 666
        });
        this.$el.html( rendered );
        return this;
    }

});





