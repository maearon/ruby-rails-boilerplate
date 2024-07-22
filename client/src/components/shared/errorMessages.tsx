import React from 'react';

export type ErrorMessageType = {
  [key: string]: string[];
};

type Props = {
  errorMessage: ErrorMessageType;
};

const ErrorMessage: React.FC<Props> = ({ errorMessage }) => {
  return (
    <div id="error_explanation">
      {Object.keys(errorMessage).length !== 0 && (
        <div className="alert alert-danger">
          The form contains {Object.keys(errorMessage).length} error
          {Object.keys(errorMessage).length !== 1 ? 's' : ''}.
        </div>
      )}
      {Object.keys(errorMessage).map((key) => (
        <ul key={key}>
          {Array.isArray(errorMessage[key]) ? (
            errorMessage[key].map((error, index) => (
              <li key={index}>
                {key} {error}
              </li>
            ))
          ) : (
            <li>
              {key}: {String(errorMessage[key])} {/* Fallback in case it's not an array */}
            </li>
          )}
        </ul>
      ))}
    </div>
  );
};

export default ErrorMessage;
