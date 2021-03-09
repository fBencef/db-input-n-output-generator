using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EscapeTheRoom
{
    class Object
    {
        public string Name { get; }
        public bool IsActive { get; set; } //pl.: fel lett-e már fedezve
        public bool IsObtainable { get; }
        public string ActivatedBy { get; set; }
        public string Location { get; set; }

        public Object(string name, bool isActive, bool isObtainable, string activatedBy, string location)
        {
            Name = name;
            IsActive = isActive;
            IsObtainable = isObtainable;

            if (activatedBy != "none") ActivatedBy = activatedBy;
            else ActivatedBy = null;

            if (location != "none") Location = location;
            else Location = null;
        }

        /// <summary>
        /// User input után aktivál egy adott tárgyat. (pl.: ajtót nyit)
        /// </summary>
        /// <param name="target">Az aktiválandó tárgy (szekrény)</param>
        /// <param name="action">A végrehajtandó utasítás (nyisd)</param>
        /// <param name="tool">A hozzá használt tárgy (kulcs)</param>
        public void Activate(string target, string action, string tool) //"event"
        {
            LevelHandler.LookforObject(target, 0);

            LevelHandler.LookforObject(tool, 0);

            //TODO: Action-t eldönteni hogy használható-e
        }

        public override string ToString()
        {
            return Name;
        }

        public string GetName()
        {
            return Name;
        }
        public string GetLocation()
        {
            return Location;
        }

        public string ToExportString()
        {
            return string.Join(";", "[object]", this.Name, this.IsActive.ToString(), this.Location);
        }
    }
}
