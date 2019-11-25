import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { Column, Row } from 'simple-flexbox';

export default class CreateDrink extends Component {

    
    constructor(props) {
        super(props);
        this.state = {
            drink: '',
            serving: '',
            mg: ''
        };

        this.changeDrink = this.changeDrink.bind(this);
        this.changeServing = this.changeServing.bind(this);
        this.changeMg = this.changeMg.bind(this);
        this.handleClick = this.handleClick.bind(this);
       
    }

    componentDidMount(){
    }

    handleClick(e) {
        e.preventDefault();
        axios.post('drinks', this.state)
        .then(response => {
            alert("Drink succesfully added");
            this.setState({drink: ''})
        }).then(error => {
            console.log(error);
        
        });
      }


    
    changeDrink(event) {
        this.setState({drink: event.target.value});

    }

    changeServing(event) {
        this.setState({serving: event.target.value});
    }
    

    changeMg(event) {
        this.setState({mg: event.target.value});
    }
    
   
    render() {

        // const { drink = ''} = this.props;
        return (

            <Column flexGrow={1} style={{ marginTop: "8%"}}>
            <Row horizontal='center'>
            </Row>
            <Row vertical='center'>
              <Column flexGrow={1} horizontal='center'>
              <form>
            
            <div class="form-group">
            <div className="form-group">
                    <label htmlFor="new-drink">Name of drink</label>
                    <input id="new-drink" style={{width:300}} className="form-control" onChange={this.changeDrink} required></input>
                </div>

            </div>
                <div className="form-group">
                    <label htmlFor="new-serving"># of Servings</label>
                    <input id="new-serving" style={{width:50}} className="form-control" onChange={this.changeServing} required></input>
                </div>

                <div className="form-group">
                    <label htmlFor="new-mg">Amount of Caffeine per serving (mg)</label>
                    <input id="new-mg" style={{width:50}} className="form-control" onChange={this.changeMg} required></input>
                </div>
                

            </form>
            <button className="btn btn-primary" onClick={(e) => this.handleClick(e)}>
                        Add Drink
                    </button>
              </Column>
              
            </Row>
          </Column>
            
        );
    }
}

if (document.getElementById('create-drink')) {
    ReactDOM.render(<CreateDrink />, document.getElementById('create-drink'));
}