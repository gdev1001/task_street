    angular
    .module( "demo.tree", [ "$ui.tree", "afterRender" ] )
    .controller( "treeController", [ "$scope", function( $scope ) {

        var deferred = $.Deferred();

        $scope.test = function() {

            $.ajax( {
                url: "//rawgit.com/trazyn/neoui-ng/master/src/demo/tree/color.json",
                dataType: "text"
            } )
            .done( function( data ) {
                deferred.resolveWith( eval( "(" + data + ")" ) );
            } );

            return deferred.promise();
        };

        /** Custom */
        $scope.files = function() {

            return $.ajax( {
                url: "//rawgit.com/trazyn/neoui-ng/master/src/demo/tree/files.json"
            } );
        };

        $scope.addBranch = function( tree, parentId ) {

            var
            settings = tree.settings,
            item = {};

            item[ settings.parentKey ] = parentId;
            item[ settings.valueKey ] = +new Date();
            item[ settings.textKey ] = "New Branch";

            tree.add( item );
        };

        $scope.afterInit = function( tree ) {

            $.when( deferred ).done( function() {

                tree
                .expand( "multicolor" )
                .expand( "white" )
                .expand("green" )
                .disabled( "green" );
            } );
        };
    } ] );
