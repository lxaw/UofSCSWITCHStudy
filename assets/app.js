/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */


////////////////////////////////////////
//
// FOR REACT
// 
// https://symfony.com/bundles/ux-react/current/index.html
import { registerReactControllerComponents } from '@symfony/ux-react';

// Registers React controller components to allow loading them from Twig
//
// React controller components are components that are meant to be rendered
// from Twig. These component then rely on other components that won't be called
// directly from Twig.
//
// By putting only controller components in `react/controllers`, you ensure that
// internal components won't be automatically included in your JS built file if
// they are not necessary.
registerReactControllerComponents(require.context('./react/controllers', true, /\.(j|t)sx?$/));
//
////////////////////////////////////////

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// compile new js file
// import './javascript/method1.js';

// start the Stimulus application
import './bootstrap';
