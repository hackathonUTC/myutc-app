var gulp = require("gulp");
var ts = require("gulp-typescript");
var gulpify = require("gulpify");
var rename = require("gulp-rename");

var tsProject = ts.createProject('server/tsconfig.json')

var tsProjectClient = ts.createProject('client/tsconfig.json')

gulp.task('server', function(){
    var tsResult = tsProject.src().pipe(ts(tsProject));

    return tsResult.js.pipe(gulp.dest('dist'));
})

gulp.task("client-typescript", function(){
    var tsResult = tsProjectClient.src().pipe(ts(tsProjectClient));

    return tsResult.js.pipe(gulp.dest('./'));
})

gulp.task("browserify", ["client-typescript"], function(){
    return gulp.src("client/iutc-app.js").pipe(gulpify("iutc.js")).pipe(gulp.dest("dist/public"));
})

gulp.task('public_files', function(){
    return gulp.src('public/**/*').pipe(gulp.dest("dist/public"));
});

gulp.task("client", ["public_files", "browserify"], function(){});

gulp.task('default', ['server', 'client'], function() {

})
