import { WebComponent } from './WebComponent.js';

/**
 * Input component
 *
 * @extends {WebComponent}
 */
export class Toggle extends WebComponent {
    constructor() {
        super();
    }
    styles() {
        const rounded = this.getAttribute('rounded') === 'true' ? '200px' : '5px';
        return `
            <style>
                input[type=checkbox]{
                    height: 0;
                    width: 0;
                    visibility: hidden;
                }
                
                label {
                    cursor: pointer;
                    text-indent: -9999px;
                    width: 200px;
                    height: 100px;
                    background: grey;
                    display: block;
                    border-radius: 100px;
                    position: relative;
                }
                
                label:after {
                    content: '';
                    position: absolute;
                    top: 5px;
                    left: 5px;
                    width: 90px;
                    height: 90px;
                    background: #fff;
                    border-radius: 90px;
                    transition: 0.3s;
                }
                
                input:checked + label {
                    background: #bada55;
                }
                
                input:checked + label:after {
                    left: calc(100% - 5px);
                    transform: translateX(-100%);
                }
                
                label:active:after {
                    width: 130px;
                }
                
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
            </style>
        `;
    }
    render() {
        return `
        <div>
            <slot></slot>
        </div>   
        `;
    }
}