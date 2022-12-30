const { dest, series, src, watch } = require( 'gulp' );
const sass = require( 'gulp-sass' )( require( 'sass' ) );
const rename = require( 'gulp-rename' );
const minify = require( 'gulp-minify' );
const del = require( 'del' );
const path = require( 'path' );

function compileJs( cb ) {
	del( 'build/js/**/*.js' );
	src( [ 'src/js/public/**/*.js' ], { allowEmpty: true } )
		.pipe( minify( { ext: { min: '.min.js' }, noSource: true } ) )
		.pipe( dest( 'build/js' ) );
	cb();
}
function compileWatchJs( cb ) {
	del( 'build/js/**/*.js' );
	src( [ 'src/js/public/**/*.js' ], { allowEmpty: true } )
		.pipe( minify( { ext: { min: '.min.js' }, noSource: true } ) )
		.pipe( dest( 'build/js' ) );
	cb();
}
function compileWatchCss( cb ) {
	del( 'build/css/**/*.css' );
	src( [ 'src/scss/**/*.scss' ] )
		.pipe( sass().on( 'error', sass.logError ) )
		.pipe( rename( { dirname: './', suffix: '.min' } ) )
		.pipe( dest( 'build/css' ) );
	cb();
}
function compileCss( cb ) {
	del( 'build/css/**/*.css' );
	src( [ 'src/scss/**/*.scss' ] )
		.pipe(
			sass( { outputStyle: 'compressed' } ).on( 'error', sass.logError )
		)
		.pipe(
			rename( {
				// dirname: "./",
				suffix: '.min',
			} )
		)
		.pipe( dest( 'build/css' ) );
	cb();
}

exports.default = series( compileCss, compileJs );
exports.watch = function () {
	watch( 'src/**/*.js', compileWatchJs );
	watch( 'src/**/*.scss', compileWatchCss );
};
