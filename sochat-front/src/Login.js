import React, { Component } from 'react';
import { Form, Button, Input, Transition, Segment, Header, Checkbox} from 'semantic-ui-react';
import { ToastContainer, toast } from 'react-toastify';
import axios from 'axios';

class LoginForm extends Component {
  constructor(props){
    super(props);

    this.state = {
      genders : [
          {
            key: 1,
            value: 1,
            text: "Male",
          },
          {
            key: 2,
            value: 2,
            text: "Female",
          },
          {
            key: 3,
            value: 3,
            text: "Other",
          }
        ],

      countries: [
        {
          key: 1,
          value: 1,
          text: "Bosna i Hercegovina",
        }
      ],

      userName: '',
      firstName: '',
      lastName: '',
      password: '',
      confirmedPassword: '',
      email: '',
      confirmedEmail: '',
      age: '',
      gender: '',
      country: '',
    };

    this.handleInputChange = this.handleInputChange.bind(this);
    this.sendSignUpRequest = this.sendSignUpRequest.bind(this);
    this.resetValues = this.resetValues.bind(this);
  }

  sendSignUpRequest(firstName, lastName, password, email, age, gender, country){
    const userRequest = {
      firstName,
      lastName,
      password,
      email,
      age,
      gender,
      country,
    };

    /*
    axios.post('/user', { ...userRequest })
        .then(res => {
            this.resetValues();
            toast("Uspjesno poslan zahtjev!");
        })
        .catch(err => {
            console.log(err);
            toast('Došlo je do greške!');
            this.setState({ requestMode: null });
        });*/

      this.resetValues();
      toast("Uspjesno poslan zahtjev!");
  }

  handleInputChange(event, { name, value }) {
      this.setState({
          [name]: value
      });
  }

  resetValues(){
    this.setState({
      firstName: '',
      lastName: '',
      password: '',
      confirmedPassword: '',
      email: '',
      confirmedEmail: '',
      age: '',
      gender: '',
      country: '',
    });
  }

  render(){
    return (
      <div>
        <Header as="h1">SoChat</Header>

      <Segment.Group raised>
      <Form>
      <Header as="h3">Sign Up</Header>
      <Form.Group widths="equal">
            <Form.Field>
              <label>Username</label>
              <input
                  placeholder='Username'
                  value={this.state.username}
                  onChange={(e) => this.setState({ userName: e.target.value })}
              />
            </Form.Field>
            <Form.Field>
            </Form.Field>
        </Form.Group>
      <Form.Group widths="equal">
            <Form.Field>
              <label>First Name</label>
              <input
                  placeholder='First Name'
                  value={this.state.firstName}
                  onChange={(e) => this.setState({ firstName: e.target.value })}
              />
            </Form.Field>
            <Form.Field>
              <label>Last Name</label>
              <input
                  placeholder='Last Name'
                  value={this.state.lastName}
                  onChange={(e) => this.setState({ lastName: e.target.value })}
              />
            </Form.Field>
        </Form.Group>

        <Form.Group widths="equal">
              <Form.Field>
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    value={this.state.password}
                    onChange={(e) => this.setState({ password: e.target.value })}
                />
              </Form.Field>
              <Form.Field>
                <label>Confirm password</label>
                <input
                    type="password"
                    name="confirmedPassword"
                    value={this.state.confirmedPassword}
                    onChange={(e) => this.setState({ confirmedPassword: e.target.value })}
                />
              </Form.Field>
          </Form.Group>

          <Form.Group widths="equal">
                <Form.Field>
                  <label>Email</label>
                  <input
                      name="email"
                      value={this.state.email}
                      onChange={(e) => this.setState({ email: e.target.value })}
                  />
                </Form.Field>
                <Form.Field>
                  <label>Confirm e-mail</label>
                  <input
                      name="confirmedEmail"
                      value={this.state.confirmedEmail}
                      onChange={(e) => this.setState({ confirmedEmail: e.target.value })}
                  />
                </Form.Field>
            </Form.Group>

            <Form.Group widths="equal">
                  <Form.Field>
                    <label>Age</label>
                    <input
                        type="number"
                        value={this.state.age}
                        name="age"
                        onChange={(e) => this.setState({ age: e.target.value })}
                    />
                  </Form.Field>
                  <Form.Dropdown
                    label="Gender"
                    name="gender"
                    value={this.state.gender}
                    options={this.state.genders}
                    onChange={this.handleInputChange}
                  />

                  <Form.Dropdown
                    label="Country"
                    name="country"
                    value={this.state.country}
                    options={this.state.countries}
                    onChange={this.handleInputChange}
                  />
              </Form.Group>
        <Form.Field>
          <Checkbox label='I agree to the Terms and Conditions' />
        </Form.Field>
        <Button
            type='submit'
            onClick={
              () => {
                  this.sendSignUpRequest(
                    this.state.firstName,
                    this.state.lastName,
                    this.state.password,
                    this.state.email,
                    this.state.age,
                    this.state.gender,
                  );
              }
            }
        >
          Submit
        </Button>
      </Form>

      <ToastContainer hideProgressBar />
      </Segment.Group>
      </div>
    );
  }
}

export default LoginForm;
