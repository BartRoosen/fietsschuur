$(document).ready(function () {
   $('.extra-info-button').on('click', function (e) {
       e.preventDefault();
       var self = $(this),
           bikeId = self.data('bikeid'),
           info = self.data('info'),
           infoId = self.data('infoid');

       $('#extra-info-display-id').html(bikeId);
       $('#extra-info-info-id').val(infoId);
       $('#extra-info-bike-id').val(bikeId);
       $('#extra-info-info').val(info);
   });
});