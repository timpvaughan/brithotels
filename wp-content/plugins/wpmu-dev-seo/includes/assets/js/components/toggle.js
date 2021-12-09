import React from "react";

export default class Toggle extends React.Component {
	static defaultProps = {
		id: '',
		label: '',
		description: '',
		checked: false,
		disabled: false,
		onChange: () => false,
	};

	render() {
		if (this.props.label) {
			return <div className="sui-form-field">
				{this.inner()}
			</div>;
		} else {
			return this.inner();
		}
	}

	inner() {
		const id = this.props.id;

		return <label htmlFor={id} className="sui-toggle">
			<input type="checkbox"
				   id={id}
				   checked={this.props.checked}
				   onChange={(e) => this.props.onChange(e.target.checked)}
				   disabled={this.props.disabled}
				   aria-labelledby={id + '-label'}
				   aria-describedby={id + '-description'}
			/>

			<span className="sui-toggle-slider" aria-hidden="true"/>

			{this.props.label &&
			<span id={id + '-label'} className="sui-toggle-label">{this.props.label}</span>
			}

			{this.props.description &&
			<span id={id + '-description'} className="sui-description">{this.props.description}</span>
			}
		</label>;
	}
}
