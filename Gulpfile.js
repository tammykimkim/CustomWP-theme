var gulp = require('gulp');
var sass = require('gulp-sass');
var browsersync = require('browser-sync');

gulp.task('styles', function() {
	gulp.src('wp-content/themes/zeroFour/style.scss')
		.pipe(sass())
		.pipe(gulp.dest('wp-content/themes/zeroFour/'))
		.pipe(browsersync.reload({stream: true}))
});

gulp.task('browser-sync', function() {
	browsersync({
		server: { baseDir: './'}
	});
});

gulp.task('watch', function() {
	gulp.watch('styles/style.scss', ['styles']);
	gulp.watch('*.html', browsersync.reload);
});

gulp.task('default', ['browser-sync', 'styles', 'watch']);