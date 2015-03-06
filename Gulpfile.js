var gulp = require('gulp');
var sass = require('gulp-sass');
var browsersync = require('browser-sync');

gulp.task('styles', function() {
	gulp.src('wp-content/themes/custom/style.scss')
		.pipe(sass())
		.pipe(gulp.dest('wp-content/themes/custom/'))
		.pipe(browsersync.reload({stream: true}))
});

gulp.task('browser-sync', function() {
	browsersync({
		// server: { baseDir: './'}
		proxy : 'localhost:8888'
	});
});

gulp.task('watch', function() {
	gulp.watch('wp-content/themes/custom/style.scss', ['styles']);
	// gulp.watch('*.php', browsersync.reload());
});

gulp.task('default', ['browser-sync', 'styles', 'watch']);