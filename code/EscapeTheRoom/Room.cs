using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EscapeTheRoom
{
    class Room
    {
        public string Name { get; }
        public List<Object> Objects { get; set; }

        public Room(string name)
        {
            Name = name;
        }

        public string GetName()
        {
            return Name;
        }
    }
}
