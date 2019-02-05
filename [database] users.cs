using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Eduka_db
{
    #region Users
    public class Users
    {
        #region Member Variables
        protected int _id;
        protected string _token;
        protected string _name;
        protected string _email;
        protected string _password;
        protected string _status;
        #endregion
        #region Constructors
        public Users() { }
        public Users(string token, string name, string email, string password, string status)
        {
            this._token=token;
            this._name=name;
            this._email=email;
            this._password=password;
            this._status=status;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Token
        {
            get {return _token;}
            set {_token=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual string Status
        {
            get {return _status;}
            set {_status=value;}
        }
        #endregion
    }
    #endregion
}