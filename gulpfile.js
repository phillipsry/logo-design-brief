var mail = require('./')
  // private
var gulp = require('gulp')

var mail = require('gulp-mail');

var smtpInfo = {
  auth: {
    user: 'ryan@hotcoffey.com',
    pass: 'Swingline'
  },
  host: 'server.hotcoffeydesign.com',
  secureConnection: true,
  port: 465
};

gulp.task('mail', function () {
  return gulp.src('./test/hcd-email.php')
    .pipe(mail({
      subject: 'Hot Coffey Design | Logo Design Brief',
      to: [
        'ryan@hotcoffeydesign.com',

      ],
      from: 'ryan@hotcoffey.com',
      smtp: smtpInfo
    }));
});

gulp.task('default', function () {
  return gulp.src('./test/hcd-email.php')
    .pipe(mail({
      subject: 'Hot Coffey Design | Logo Design Brief',
      to: [
        'ryan@hotcoffeydesign.com',

      ],
      from: 'ryan@hotcoffey.com',
      smtp: smtpInfo
    }));
});


gulp.task('test', function(){
  // send mail
  return gulp.src([
      './test/hcd-email.php',
      './test/1.php',
      './test/2.php'
    ])
    .pipe(mail({
      to: mailInfo.to,
      from: mailInfo.from,
      smtp: mailInfo.smtp
    }))


var serve = require('gulp-serve');

gulp.task('serve', serve('public'));
  // blocked after sending
  // becase transporter remained working
})
