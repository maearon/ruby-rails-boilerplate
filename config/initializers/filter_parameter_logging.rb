# Be sure to restart your server when you modify this file.

# Configure sensitive parameters which will be filtered from the log file.
# Rails.application.config.filter_parameters += [:password]
# Configure parameters to be filtered from the log file. Use this to limit dissemination of
# sensitive information. See the ActiveSupport::ParameterFilter documentation for supported
# notations and behaviors.
Rails.application.config.filter_parameters += [
  :passw, :secret, :token, :_key, :crypt, :salt, :certificate, :otp, :ssn
]
