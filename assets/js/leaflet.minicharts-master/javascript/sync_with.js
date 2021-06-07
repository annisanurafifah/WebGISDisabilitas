(function() {
  'use strict';

  LeafletWidget.methods.syncWith = function(groupname) {
    var self = this;
    if (!LeafletWidget.syncGroups) {
      LeafletWidget.syncGroups = {};
      LeafletWidget.syncGroups.sync = function(map, groupname) {
        var zoom = map.getZoom();
        var center = map.getCenter();
        if(LeafletWidget.syncGroups[groupname].length > 1){
          for (var i = 0; i < LeafletWidget.syncGroups[groupname].length; i++) {
            LeafletWidget.syncGroups[groupname][i].off("move");
            LeafletWidget.syncGroups[groupname][i].setView(center, zoom, {animate: false});
            LeafletWidget.syncGroups[groupname][i].on("move", function() {
              LeafletWidget.syncGroups.sync(this, groupname);
            });
          }
        }
      }
    }
    if (!LeafletWidget.syncGroups[groupname]) LeafletWidget.syncGroups[groupname] = [];

    LeafletWidget.syncGroups[groupname].push(self);

    // Bug with leafet > 1, & no really need...?
    self.on("move", function() {
      LeafletWidget.syncGroups.sync(self, groupname);
    });

    self.syncGroup = groupname;
    LeafletWidget.syncGroups.sync(self, groupname);
  }
}());
