import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { Column, Row } from 'simple-flexbox';

export default class Drink extends Component {

    
    constructor(props) {
        super(props);
        this.state = {
            drink: '',
            serving: '',
            caffeine_allowance: 0,
            how_many_selected_drink:'',
            drinks:[]
        };

        this.changeDrink = this.changeDrink.bind(this);
        this.changeServing = this.changeServing.bind(this);
        this.handleClick = this.handleClick.bind(this);
       
    }

    componentDidMount(){
        //Populate Select Drink dropdown
        axios.get('/drinks').then(response=>{
            this.setState({drinks:response.data})
        }).catch(errors=>{
            console.log(errors);
        })

        axios.get('/allowance').then(response=>{
            this.setState({ caffeine_allowance:response.data})
        }).catch(errors=>{
            console.log(errors);
        })


    }

    handleClick(e) {
        e.preventDefault();
        
        axios.post('drinker', this.state)
        .then(response => {

            let newTotal = this.state.caffeine_allowance - response.data.cost;

            this.setState({how_many_selected_drink:response.data.howmany})
            if(response.data == 'over500'){
                newTotal = 'That last drink puts you over your daily limit! Please Refresh screen.';
                this.setState({caffeine_allowance:newTotal})
                alert('Drink cause 500+ caffeine intake. Drink was not recorded in history. Please refresh screen.');
               
            }else{
                this.setState({caffeine_allowance:newTotal})
                alert('Drink succesfully entered')
            }
           
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
    

    
   
    render() {

        const { drink = ''} = this.props;
        return (

            <Column flexGrow={1} style={{ marginTop: "8%"}}>
            <Row horizontal='center'>
            </Row>
            <Row vertical='center'>
              <Column flexGrow={1} horizontal='center'>
              <form>
            
            <div class="form-group">
                <label for="new-drink">Select Drink:</label>
                <select class="form-control" style={{width:250}} id="new-drink" onChange={this.changeDrink} required>
                <option value="">select...</option>
                    {
                        this.state.drinks.map(
                            data =>  <option key={data.id} value={data.id}>{data.drink_name}</option>
                        )
                    }
                </select>
            </div>
                <div className="form-group">
                    <label htmlFor="new-serving"># of Servings</label>
                    <input id="new-serving" style={{width:50}} className="form-control" onChange={this.changeServing} required></input>
                </div>
                

            </form>
            <button className="btn btn-primary" onClick={(e) => this.handleClick(e)}>
                        Calculate Caffeine
                    </button>
              </Column>
              <Column flexGrow={1} horizontal='center' alignItems='center'>
                <div>
                    <h2 style={{textAlign: 'center'}}>Today's Caffeine Allowance</h2>
                    <hr/>
                    <h3 style={{textAlign: 'center'}}>{this.state.caffeine_allowance} {this.state.caffeine_allowance == "That last drink puts you over your daily limit! Please Refresh screen." ? '' : "mg"}</h3>
                    <span style={{textAlign: 'center',fontSize: '15px'}}>{this.state.how_many_selected_drink}   </span>
                </div>
              </Column>
            </Row>
          </Column>
            
        );
    }
}

if (document.getElementById('caffeine-drink')) {
    ReactDOM.render(<Drink />, document.getElementById('caffeine-drink'));
}